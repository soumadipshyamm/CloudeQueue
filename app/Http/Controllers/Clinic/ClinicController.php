<?php

namespace App\Http\Controllers\Clinic;
use Illuminate\Http\Request;
use App\Models\location\Country;
use Illuminate\Support\Facades\DB;
use App\Contracts\Auth\AuthContract;
use App\Http\Controllers\Controller;
use App\Contracts\Clinic\ClinicContract;
use App\Contracts\Doctor\DoctorContract;
use App\Http\Controllers\BaseController;
use App\Contracts\Patient\PatientContract;

class ClinicController extends BaseController
{
    private $AuthContract;
    private $ClinicContract;
    private $DoctorContract;
    private $PatientContract;
    public function __construct(AuthContract $AuthContract, ClinicContract $ClinicContract, DoctorContract $DoctorContract,  PatientContract $PatientContract)
    {
        $this->AuthContract = $AuthContract;
        $this->ClinicContract = $ClinicContract;
        $this->DoctorContract = $DoctorContract;
        $this->PatientContract = $PatientContract;
    }
    public function index()
    {
        $this->setPageTitle('Add Clinic');
        if (auth()->user()->roles->first()->slug == 'clinic') {
            // dd( auth()->user());
            $fetchClinicList = $this->ClinicContract->findClinicStaff(auth()->user()->uuid);
            $fetchClinicList->clinicUser;
            // dd($fetchClinicList);
            return view('admin.clinic.staff.index', compact('fetchClinicList'));
        } else {
            $fetchClinicList = $this->ClinicContract->getAll();
            return view('admin.clinic.index', compact('fetchClinicList'));
        }
    }
    public function add(Request $request)
    {
        $this->setPageTitle('Add Clinic');
        if ($request->isMethod('post')) {
            $request->validate([
                'clinic_name' => 'required',
                'clinic_email' => 'required'
            ]);
            DB::beginTransaction();
            try {
                if ($request->uuid) {
                    $insertArry = $request->merge(['type' => 'clinic'])->except(['_token', '_method']);
                    $isClinicUpdated = $this->ClinicContract->updateProfile($insertArry);
                    if ($isClinicUpdated) {
                        DB::commit();
                        return $this->responseRedirect('admin.clinic.list', 'Clinic Updated Successfully', 'success', false);
                    }
                } else {
                    // Clinic
                    $insertArry = $request->merge(['type' => 'clinic'])->except(['_token', '_method', 'id']);
                    $isClinicCreated = $this->ClinicContract->createProfile($insertArry);
                    // Clinic Staff
                    $insert_arry = $request->merge(['type' => 'clinic', 'parent_id' => null, 'clinicId' => $isClinicCreated->id])->except(['_token', '_method', 'id']);
                    $addUser = $this->AuthContract->registration($insert_arry);
                    if ($isClinicCreated) {
                        DB::commit();
                        return $this->responseRedirect('admin.clinic.list', 'Clinic Created Successfully', 'success', false);
                    }
                }
            } catch (\Exception $e) {
                DB::rollBack();
                logger($e->getMessage() . '--' . $e->getFile() . '--' . $e->getLine());
                return $this->responseRedirectBack('Something went wrong', 'error', true);
            }
        }
        $getCountries = Country::all();
        return view('admin.clinic.add-edit', compact('getCountries'));
    }
    public function edit($uuid)
    {
        $this->setPageTitle('Edit Clinic');
        $data = $this->ClinicContract->findId($uuid);
        $getCountries = Country::all();
        return view('admin.clinic.add-edit', compact('data', 'getCountries'));
    }
    public function details($uuid)
    {
        $this->setPageTitle('Clinic Details');
        $isClinic = $this->ClinicContract->findId($uuid);
        $clinicUser = $isClinic->userClinic->first();
        return view('admin.clinic.details', compact('isClinic', 'clinicUser'));
    }
    // ************************Clinic Staff*********************************************************************

    public function staffList($uuid)
    {
        $this->setPageTitle('Clinic Staff List');
        $fetchClinicList = $this->ClinicContract->findId($uuid);
        return view('admin.clinic.staff.index', compact('fetchClinicList'));
    }
    public function addStaff(Request $request)
    {
        $this->setPageTitle('Add Clinic Staff');
        if ($request->isMethod('post')) {
            $request->validate([
                'name' => 'required',
                'email' => 'required|email'
            ]);
            DB::beginTransaction();
            try {
                if ($request->uuid) {
                    $insert_arry = $request->merge(['type' => 'clinic', 'parent_id' => null])->except(['_token', '_method', 'id']);
                    $addUser = $this->AuthContract->updateUser($insert_arry);
                    if ($addUser) {
                        DB::commit();
                        return $this->responseRedirect('admin.clinic.list', 'Clinic Staff Update Successfully', 'success', false);
                    }
                } else {
                    // Clinic Staff
                    $insert_arry = $request->merge(['type' => 'clinic', 'parent_id' => null])->except(['_token', '_method', 'id']);
                    $addUser = $this->AuthContract->registration($insert_arry);
                    if ($addUser) {
                        DB::commit();
                        return $this->responseRedirect('admin.clinic.staff.list', 'Clinic Staff Created Successfully', 'success', false);
                    }
                }
            } catch (\Exception $e) {
                DB::rollBack();
                logger($e->getMessage() . '--' . $e->getFile() . '--' . $e->getLine());
                return $this->responseRedirectBack('Something went wrong', 'error', true);
            }
        }
        $getCountries = Country::all();
        return view('admin.clinic.staff.add-edit', compact('getCountries'));
    }
    public function staffEdit($uuid)
    {
        $this->setPageTitle('Edit Clinic Staff ');
        $data = $this->ClinicContract->findClinicStaff($uuid);
        return view('admin.clinic.staff.add-edit', compact('data'));
    }
    public function staffDetails($uuid)
    {
        $this->setPageTitle('Clinic Staff ');
        $isClinicStaff = $this->ClinicContract->findClinicStaff($uuid);
        return view('admin.clinic.staff.details', compact('isClinicStaff'));
    }

    public function getClinicDoctor($uuid)
    {
        $this->setPageTitle('Clinic Doctor List');
        $isUser = $this->ClinicContract->findId($uuid);
        $schedules = $isUser->schedules;
        return view('admin.doctor.doctor', compact('schedules'));
    }
}
