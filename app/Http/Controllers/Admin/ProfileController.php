<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Contracts\Auth\AuthContract;
use App\Http\Controllers\Controller;
use App\Contracts\Clinic\ClinicContract;
use App\Contracts\Doctor\DoctorContract;
use App\Http\Controllers\BaseController;
use App\Contracts\Patient\PatientContract;

class ProfileController extends BaseController
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
    public function profileView()
    {
        $this->setPageTitle('Update Profile');
        return view('admin.profile.update-profile');
    }

    public function profileUpdate(Request $request)
    {
        $this->setPageTitle('Update Profile');
        
        if ($request->isMethod('post')) {
            $request->validate([
                'name' => 'required',
                'email' => 'required'
            ]);
            DB::beginTransaction();
            try {
                $insert_arry = $request->merge(['type' => 'doctor', 'parent_id' => null, 'uuid' => auth()->user()->uuid])->except(['_token', '_method', 'id']);
                $updateUser = $this->AuthContract->updateUser($insert_arry);
                $message = 'Profile Updated Successfully';
                if ($updateUser) {
                    DB::commit();
                    return $this->responseRedirect('admin.profile.view', $message, 'success', false);
                }
            } catch (\Exception $e) {
                DB::rollBack();
                logger($e->getMessage() . '--' . $e->getFile() . '--' . $e->getLine());
                return $this->responseRedirectBack('Something went wrong', 'error', true);
            }
        }
    }

    public function newPassword()
    {
        $this->setPageTitle('Update Password');
        return view('admin.profile.update-password');
    }

    public function passwordUpdate(Request $request)
    {
        $this->setPageTitle('Update Password');
        
        if ($request->isMethod('post')) {
            $request->validate([
                'password' => 'required|string|min:8',
                'confirm_password' => 'required_with:password|same:password|min:8',
            ]);
            DB::beginTransaction();
            try {
                $updateUser = User::find(auth()->user()->id)->update([
                    'password' => bcrypt($request->password)
                ]);
                $message = 'Password Updated Successfully';
                if ($updateUser) {
                    DB::commit();
                    return $this->responseRedirect('admin.profile.view', $message, 'success', false);
                }
            } catch (\Exception $e) {
                DB::rollBack();
                logger($e->getMessage() . '--' . $e->getFile() . '--' . $e->getLine());
                return $this->responseRedirectBack('Something went wrong', 'error', true);
            }
        }
    }
}
