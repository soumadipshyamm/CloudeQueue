<?php

namespace App\Http\Controllers\Doctor;

use Illuminate\Http\Request;
use App\Models\location\Country;
use Illuminate\Support\Facades\DB;
use App\Contracts\Auth\AuthContract;
use App\Http\Controllers\Controller;
use App\Contracts\Clinic\ClinicContract;
use App\Contracts\Doctor\DoctorContract;
use App\Http\Controllers\BaseController;
use Illuminate\Support\Facades\Validator;
use App\Contracts\Patient\PatientContract;
use App\Models\location\City;
use App\Models\location\State;

class DoctorController extends BaseController
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
        $this->setPageTitle('Doctor');
        if(auth()->user()->type == 'clinic'){
            $isUser = $this->ClinicContract->findId(auth()->user()->clinicUser[0]?->uuid);
            $fetchDoctorList = $isUser->schedules;
        }else{
            $fetchDoctorList = $this->DoctorContract->getAll();
        }
        return view('admin.doctor.index', compact('fetchDoctorList'));
    }
    public function add(Request $request)
    {
        $this->setPageTitle('Add Doctor Details');
        if ($request->isMethod('post')) {
            $request->validate([
                'name' => 'required',
                'email' => 'required'
            ]);
            DB::beginTransaction();
            try {
                if($request->uuid == null){
                    $insert_arry = $request->merge(['type' => 'doctor', 'parent_id' => null])->except(['_token', '_method', 'id']);
                    $addUser = $this->AuthContract->registration($insert_arry);
                    $insertArry = $request->merge(['userId' => $addUser->id])->except(['_token', '_method', 'id']);
                    $isDoctorCreated = $this->DoctorContract->createProfile($insertArry);
                    $message = 'Doctor Created Successfully';
                }else{
                    $id = uuidtoid($request->uuid, 'users');
                    $insert_arry = $request->merge(['type' => 'doctor', 'parent_id' => null])->except(['_token', '_method', 'id']);
                    $addUser = $this->AuthContract->updateUser($insert_arry);
                    $insertArry = $request->merge(['userId' => $id])->except(['_token', '_method', 'id']);
                    $isDoctorCreated = $this->DoctorContract->updateProfile($insertArry);
                    $message = 'Doctor Updated Successfully';
                }
                if ($isDoctorCreated) {
                    DB::commit();
                    return $this->responseRedirect('admin.doctor.list', 'Doctor Created Successfully', 'success', false);
                }
            } catch (\Exception $e) {
                DB::rollBack();
                logger($e->getMessage() . '--' . $e->getFile() . '--' . $e->getLine());
                return $this->responseRedirectBack('Something went wrong', 'error', true);
            }
        }
        $getCountries = Country::all();
        return view('admin.doctor.add-edit', compact('getCountries'));
    }

    public function edit($uuid){
        $this->setPageTitle('Edit Doctor Details');
        $getCountries = Country::all();
        $id = uuidtoid($uuid, 'users');
        $isDoctor = $this->DoctorContract->findId($id);
        return view('admin.doctor.add-edit', compact('isDoctor', 'getCountries'));
    }

    public function details($uuid){
        $this->setPageTitle('Doctor');
        $id = uuidtoid($uuid, 'users');
        $isDoctor = $this->DoctorContract->findId($id);
        return view('admin.doctor.details', compact('isDoctor'));
    }

    public function getStateByCountry(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required|exists:countries,id',
        ]);
        if ($validator->fails()) return $this->responseJson(false, 422, $validator->errors()->first(), '');
        try {
            $isState = State::where('country_id', $request->id)->get();

            if ($isState) {
                return $this->responseJson(true, 200, "State found successfully", $isState);
            } else {
                return $this->responseJson(false, 200, "State not found");
            }
        } catch (\Exception $e) {
            logger($e->getMessage() . 'on' . $e->getFile() . 'in' . $e->getLine());
            return $this->responseJson(false, 500, "Something went wrong");
        }
    }

    public function getCityByState(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required|exists:states,id',
        ]);
        if ($validator->fails()) return $this->responseJson(false, 422, $validator->errors()->first(), '');
        try {
            $isCity = City::where('state_id', $request->id)->get();

            if ($isCity) {
                return $this->responseJson(true, 200, "City found successfully", $isCity);
            } else {
                return $this->responseJson(false, 200, "City not found");
            }
        } catch (\Exception $e) {
            logger($e->getMessage() . 'on' . $e->getFile() . 'in' . $e->getLine());
            return $this->responseJson(false, 500, "Something went wrong");
        }
    }

    public function getDoctorClinic($uuid)
    {
        $this->setPageTitle('Doctor Clinic List');
        $id = uuidtoid($uuid, 'users');
        $isUser = $this->AuthContract->showProfile($id);
        return view('admin.clinic.clinic', compact('isUser'));
    }
}
