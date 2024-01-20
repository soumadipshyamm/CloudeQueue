<?php

namespace App\Http\Controllers\Subscription;

use App\Contracts\Auth\AuthContract;
use App\Contracts\Clinic\ClinicContract;
use App\Contracts\Doctor\DoctorContract;
use App\Contracts\Schedule\ScheduleContract;
use App\Contracts\Subscription\SubscriptionContract;
use App\Http\Controllers\BaseController;
use App\Models\Subscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubscriptionController extends BaseController
{

    private $AuthContract;
    private $ClinicContract;
    private $DoctorContract;
    private $ScheduleContract;
    private $SubscriptionContract;

    public function __construct(AuthContract $AuthContract, ClinicContract $ClinicContract, DoctorContract $DoctorContract, ScheduleContract $ScheduleContract, SubscriptionContract $SubscriptionContract)
    {
        $this->AuthContract = $AuthContract;
        $this->ClinicContract = $ClinicContract;
        $this->DoctorContract = $DoctorContract;
        $this->ScheduleContract = $ScheduleContract;
        $this->SubscriptionContract = $SubscriptionContract;
    }
    public function index(Request $request)
    {
        $this->setPageTitle('Subscription List');
        $fetchData = $this->SubscriptionContract->getAll();
        // dd($fetchData);
        return view('admin.subscription.index', compact('fetchData'));
    }
    public function add(Request $request)
    {
        $this->setPageTitle('Subscription');
        if ($request->isMethod('post')) {
            $request->validate([
                'free_subscription' => 'in:1,0',
                'payment_mode' => 'required_if:free_subscription,0',
                'amount' => 'required_if:free_subscription,0',
                'trial_period' => 'required_if:free_subscription,0',
                'duration' => 'required_if:free_subscription,0',
            ]);
            DB::beginTransaction();
            // $isExites = Schedule::where('user_id', $request->doctorId)->where('profile_clinics_id', $request->clinicId)->first();
            try {
                // dd($request->all());
                // if (isset($isExites) && $isExites != null) {
                //     $insertArry = $request->merge(['id' => $isExites->id])->except(['_token', '_method']);
                //     $isSchedule = $this->ScheduleContract->updateSchedule($insertArry);
                //     $message = 'Schedule Updated Successfully';
                // } else {
                $insertArry = $request->except(['_token', '_method', 'id']);
                $isSchedule = $this->SubscriptionContract->createSubscription($insertArry);
                $message = 'Subcription Created Successfully';
                // }
                if ($isSchedule) {
                    DB::commit();
                    return $this->responseRedirect('admin.subscription.list', $message, 'success', false);
                }
            } catch (\Exception $e) {
                DB::rollBack();
                logger($e->getMessage() . '--' . $e->getFile() . '--' . $e->getLine());
                return $this->responseRedirectBack('Something went wrong', 'error', true);
            }
        }

        return view('admin.subscription.add-edit');
    }
    public function edit($uuid)
    {
        $this->setPageTitle('Edit Subscription');
        return view('admin.subscription.add-edit');
    }

    // ********************************** Manage Subscription Features*******************************************

    public function features($uuid)
    {
        $this->setPageTitle('Subscription Features');
        return view('admin.subscription.manage-features');
    }

}
