<?php

namespace App\Http\Controllers\Api\Patient;

use App\Contracts\Auth\AuthContract;
use App\Contracts\Clinic\ClinicContract;
use App\Contracts\Doctor\DoctorContract;
use App\Contracts\Patient\PatientContract;
use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Http\Resources\User\UserResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

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

    // public function showProfile(Request $request)
    // {
    //     DB::beginTransaction();
    //     try {
    //         $id = $request->user_id;
    //         $showProfile = $this->PatientContract->showProfile($id);
    //         // dd($showProfile->toArray());

    //         if ($showProfile) {
    //             DB::commit();
    //             return $this->responseJson(true, 201, 'Your Family Member Registration  Successfully',  UserResource::collection($showProfile));
    //         }
    //     } catch (\Exception $e) {
    //         DB::rollBack();
    //         logger($e->getMessage() . 'on' . $e->getFile() . 'in' . $e->getLine());
    //         return $this->responseJson(false, 500, $e->getMessage(), []);
    //     }
    // }


    public function addFamilyMember(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'phone' => 'required|numeric|unique:users,mobile_number|digits:10',
            'name' => 'required',
            'email' => 'required|unique:users,email|max:250',
            'password' => 'required',
            'profile_images' => 'mimes:jpeg,jpg,png',
            'type' => 'required|in:patient'
        ]);
        if ($validator->fails()) {
            $status = false;
            $code = 422;
            $response = [];
            $message = $validator->errors()->first();
            return $this->responseJson($status, $code, $message, $response);
        }
        DB::beginTransaction();
        try {
            $insert_arry = $request->except(['_token', '_method', 'id']);
            $addUser = $this->AuthContract->registration($insert_arry);
            $insert_arry = $request->merge(['userId' => $addUser->id])->except(['_token', '_method', 'id']);
            if ($request->type == 'patient') {
                $createProfile = $this->PatientContract->createProfile($insert_arry);
            }
            if ($createProfile) {
                DB::commit();
                return $this->responseJson(true, 201, 'Your Family Member Registration  Successfully', new UserResource($createProfile));
            }
        } catch (\Exception $e) {
            DB::rollBack();
            logger($e->getMessage() . 'on' . $e->getFile() . 'in' . $e->getLine());
            return $this->responseJson(false, 500, $e->getMessage(), []);
        }
    }
}
