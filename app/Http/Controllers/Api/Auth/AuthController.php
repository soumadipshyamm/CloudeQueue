<?php

namespace App\Http\Controllers\Api\Auth;

use App\Contracts\Auth\AuthContract;
use App\Contracts\Clinic\ClinicContract;
use App\Contracts\Doctor\DoctorContract;
use App\Contracts\Patient\PatientContract;
use App\Http\Controllers\BaseController;
use App\Http\Resources\User\UserResource;
use App\Models\Profile;
use App\Models\ProfileDoctor;
use App\Models\role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Exception;

class AuthController extends BaseController
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
    public function signUp(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'phone' => 'required|numeric|unique:users,mobile_number|digits:10',
            'name' => 'required',
            'email' => 'required|unique:users,email|max:250',
            'password' => 'required',
            'profile_images' => 'mimes:jpeg,jpg,png',
            'type' => 'required|in:admin,clinic,patient,doctor'
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
            if ($request->type == 'doctor') {
                $createProfile = $this->DoctorContract->createProfile($insert_arry);
            } elseif ($request->type == 'clinic') {
                $createProfile = $this->ClinicContract->createProfile($insert_arry);
            } elseif ($request->type == 'patient') {
                $createProfile = $this->PatientContract->createProfile($insert_arry);
            }
            if ($createProfile) {
                DB::commit();
                return $this->responseJson(true, 201, 'Registration Successfully', $createProfile);
            }
        } catch (\Exception $e) {
            DB::rollBack();
            logger($e->getMessage() . 'on' . $e->getFile() . 'in' . $e->getLine());
            return $this->responseJson(false, 500, $e->getMessage(), []);
        }
    }
    public function generateOtp(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'phone' => 'required|numeric|exists:users,mobile_number',
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
            $user = User::where('mobile_number', $request->phone)->first();
            if (isset($user)) {
                $otpLogin =  $user->update([
                    'verification_code' => rand(1000, 9999)
                ]);
            }
            if ($otpLogin) {
                DB::commit();
                return $this->responseJson(true, 201, 'Otp Genaret Successfully', $user);
            }
        } catch (\Exception $e) {
            DB::rollBack();
            logger($e->getMessage() . 'on' . $e->getFile() . 'in' . $e->getLine());
            return $this->responseJson(false, 500, $e->getMessage(), []);
        }
    }
    public function loginOtp(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'phone' => 'required|numeric|exists:users,mobile_number|digits:10',
            'otp' => 'required|numeric|exists:users,verification_code'
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
            $data = [
                'mobile_number' => $request->phone,
                'verification_code' => $request->otp
            ];
            $user = User::where(['mobile_number' => $request->phone, 'verification_code' => $request->otp])->first();
            if ($user) {
                auth()->login($user);
                $user->update(['verification_code' => null]);
                $data['accessToken'] = $user->createToken('authToken')->accessToken;
                $data['user'] = $user;
                DB::commit();
                return $this->responseJson(true, 200, 'User Login Successfully ', $data);
            } else {
                return $this->responseJson(false, 401, 'Invalied Otp', []);
            }
        } catch (\Exception $e) {
            DB::rollBack();
            logger($e->getMessage() . 'on' . $e->getFile() . 'in' . $e->getLine());
            return $this->responseJson(false, 500, $e->getMessage(), []);
        }
    }
    public function loginEmailPassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|exists:users,email',
            'password' => 'required'
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
            $data = [
                'email' => $request->email,
                'password' => $request->password
            ];
            if (auth()->attempt($data)) {
                $datas['accessToken'] = auth()->user()->createToken('authToken')->accessToken;
                $datas['user'] = auth()->user();
                DB::commit();
                return $this->responseJson(true, 200, 'User Login Successfully ', $datas);
            } else {
                return $this->responseJson(false, 401, 'Worng Password', []);
            }
        } catch (\Exception $e) {
            DB::rollBack();
            logger($e->getMessage() . 'on' . $e->getFile() . 'in' . $e->getLine());
            return $this->responseJson(false, 500, $e->getMessage(), []);
        }
    }
    public function forgotPassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|exists:users,id',
            'password' => 'required|confirmed',
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
            User::whereId($request->user_id)->update([
                'password' => Hash::make($request->password)
            ]);
            DB::commit();
            return $this->responseJson(true, 200, 'Your Password Update Successfully ', []);
        } catch (\Exception $e) {
            DB::rollBack();
            logger($e->getMessage() . 'on' . $e->getFile() . 'in' . $e->getLine());
            return $this->responseJson(false, 500, $e->getMessage(), []);
        }
    }
    public function logout(Request $request)
    {
        try {
            $token = auth()->user()->token();
            $token->revoke();
            return $this->responseJson(true, 200, "You Have been Successfully Logged Out!", []);
        } catch (\Exception $e) {
            logger($e->getMessage() . 'on' . $e->getFile() . 'in' . $e->getLine());
            return $this->responseJson(false, 500, "Something Went Wrong", $e->getFile());
        }
    }

    public function showProfile(Request $request)
    {
        DB::beginTransaction();
        try {
            $id = $request->user_id;
            $showProfile = $this->AuthContract->showProfile($id);
            // dd($showProfile->toArray());

            if ($showProfile) {
                DB::commit();
                return $this->responseJson(true, 201, 'Your Family Member Registration  Successfully',  UserResource::collection($showProfile));
            }
        } catch (\Exception $e) {
            DB::rollBack();
            logger($e->getMessage() . 'on' . $e->getFile() . 'in' . $e->getLine());
            return $this->responseJson(false, 500, $e->getMessage(), []);
        }
    }
}
