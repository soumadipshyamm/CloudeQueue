<?php

namespace App\Http\Controllers\Auth;

use App\Contracts\Auth\AuthContract;
use App\Contracts\Clinic\ClinicContract;
use App\Contracts\Doctor\DoctorContract;
use App\Contracts\Patient\PatientContract;
use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

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

    public function login(Request $request)
    {
        $this->setPageTitle('User Login');
        if ($request->post()) {
            $request->validate([
                'email' => 'required|email|exists:users,email',
                'password' => 'required'
            ]);
            DB::beginTransaction();
            try {
                $isExits=User::where('email',$request->email)->first();
                if ($isExits!=null) {
                $userData = $request->only('email', 'password');
                $login = auth()->attempt($userData, true);
                if ($login) {
                    DB::commit();
                    return $this->responseRedirect('admin.dashboard.dashboard', 'Login Successfully', 'success');
                } else {
                    return $this->responseRedirectBack('Something went wrong ', 'false');
                }

            }else{
                return $this->responseRedirectBack('Something went wrong ', 'false');
            }
            } catch (\Exception $e) {
                DB::rollback();
                logger($e->getMessage() . ' -- ' . $e->getLine() . ' -- ' . $e->getFile());
                return $this->responseRedirectBack('Something went wrong', 'error', true);
            }
        }
        return view('admin.auth.login');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        Session::flush();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return $this->responseRedirect('login', 'You have logged out successfully!', 'success');
        // return redirect()->route('login')
        //     ->withSuccess('You have logged out successfully!');
    }
}
