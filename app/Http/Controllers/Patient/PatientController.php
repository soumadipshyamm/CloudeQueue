<?php

namespace App\Http\Controllers\Patient;

use Illuminate\Http\Request;
use App\Models\location\Country;
use Illuminate\Support\Facades\DB;
use App\Contracts\Auth\AuthContract;
use App\Http\Controllers\Controller;
use App\Contracts\Clinic\ClinicContract;
use App\Contracts\Doctor\DoctorContract;
use App\Http\Controllers\BaseController;
use App\Contracts\Patient\PatientContract;

class PatientController extends BaseController
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
    public function index(Request $Request)
    {
        $this->setPageTitle('Add Patient Details');
        $fetchPatientList = $this->PatientContract->getAll();
        return view('admin.patients.index', compact('fetchPatientList'));
    }
    public function add(Request $request)
    {
        $this->setPageTitle('Add Patient Details');
        if ($request->isMethod('post')) {
            $request->validate([
                'name' => 'required',
                'email' => 'required'
            ]);
            DB::beginTransaction();
            try {
                if($request->uuid == null){
                    $insert_arry = $request->merge(['type' => 'patient', 'parent_id' => null])->except(['_token', '_method', 'id']);
                    $addUser = $this->AuthContract->registration($insert_arry);
                    $insertArry = $request->merge(['userId' => $addUser->id])->except(['_token', '_method', 'id']);
                    $isPatientCreated = $this->PatientContract->createProfile($insertArry);
                    $message = 'Patients Created Successfully';
                }else{
                    $id = uuidtoid($request->uuid, 'users');
                    $insert_arry = $request->merge(['type' => 'patient', 'parent_id' => null])->except(['_token', '_method', 'id']);
                    $addUser = $this->AuthContract->updateUser($insert_arry);
                    $insertArry = $request->merge(['userId' => $id])->except(['_token', '_method', 'id']);
                    $isPatientCreated = $this->PatientContract->updateProfile($insertArry);
                    $message = 'Patients Updated Successfully';
                }
                if ($isPatientCreated) {
                    DB::commit();
                    return $this->responseRedirect('admin.patient.list', $message, 'success', false);
                }
            } catch (\Exception $e) {
                DB::rollBack();
                logger($e->getMessage() . '--' . $e->getFile() . '--' . $e->getLine());
                return $this->responseRedirectBack('Something went wrong', 'error', true);
            }
        }
        $getCountries = Country::all();
        return view('admin.patients.add-edit', compact('getCountries'));
    }

    public function edit($uuid){
        $this->setPageTitle('Edit Patient Details');
        $getCountries = Country::all();
        $id = uuidtoid($uuid, 'users');
        $isPatient = $this->PatientContract->findId($id);
        return view('admin.patients.add-edit', compact('isPatient', 'getCountries'));
    }

    public function details($uuid){
        $id = uuidtoid($uuid, 'users');
        $isPatient = $this->PatientContract->findId($id);
        return view('admin.patients.details', compact('isPatient'));
    }
}
