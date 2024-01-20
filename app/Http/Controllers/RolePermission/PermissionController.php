<?php

namespace App\Http\Controllers\RolePermission;

use App\Contracts\Auth\AuthContract;
use App\Contracts\Clinic\ClinicContract;
use App\Contracts\Doctor\DoctorContract;
use App\Contracts\Schedule\ScheduleContract;
use App\Contracts\Subscription\SubscriptionContract;
use App\Contracts\UserManagment\UserManagmentContract;
use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PermissionController extends BaseController
{
    private $AuthContract;
    private $ClinicContract;
    private $DoctorContract;
    private $ScheduleContract;
    private $SubscriptionContract;
    private $UserManagmentContract;

    public function __construct(AuthContract $AuthContract, ClinicContract $ClinicContract, DoctorContract $DoctorContract, ScheduleContract $ScheduleContract, SubscriptionContract $SubscriptionContract,UserManagmentContract $UserManagmentContract)
    {
        $this->AuthContract = $AuthContract;
        $this->ClinicContract = $ClinicContract;
        $this->DoctorContract = $DoctorContract;
        $this->ScheduleContract = $ScheduleContract;
        $this->SubscriptionContract = $SubscriptionContract;
        $this->UserManagmentContract = $UserManagmentContract;
    }

    public function index()
    {
        $this->setPageTitle('User Permission');
        $fetchAll = $this->UserManagmentContract->getAllUser();
        return view('admin.user-managment.user-permission.index',compact('fetchAll'));
    }

    public function add(Request $request)
    {
        $this->setPageTitle('Add User Permission');
        if ($request->isMethod('post')) {
            // dd($request->all());
            $request->validate([
                'role' => 'required',
            ]);
            DB::beginTransaction();
            try {
                $insertArry = $request->merge(['user_id' => auth()->user()->id,'gender'=>'male'])->except(['_token', '_method']);
                $isRoleCreated =$this->AuthContract->registration($insertArry);
                $message = 'Role Created Successfully';
                // }
                if ($isRoleCreated) {
                    DB::commit();
                    return $this->responseRedirect('admin.role-permission.list', $message, 'success', false);
                }
            } catch (\Exception $e) {
                DB::rollBack();
                logger($e->getMessage() . '--' . $e->getFile() . '--' . $e->getLine());
                return $this->responseRedirectBack('Something went wrong', 'error', true);
            }
        }
        return view('admin.user-managment.user-permission.add-edit');
    }

    public function edit($id)
    {
        $this->setPageTitle('Add User Permission');
        return view('admin.user-managment.user-permission.add-edit');
    }
    public function permission($id)
    {
        $this->setPageTitle('Permission');
        return view('admin.user-managment.permission.add-edit');
    }
}

