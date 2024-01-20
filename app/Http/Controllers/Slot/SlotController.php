<?php

namespace App\Http\Controllers\Slot;

use App\Contracts\Auth\AuthContract;
use App\Contracts\Clinic\ClinicContract;
use App\Contracts\Doctor\DoctorContract;
use App\Contracts\Patient\PatientContract;
use App\Contracts\Schedule\ScheduleContract;
use App\Http\Controllers\BaseController;
use App\Models\Schedule;
use App\Models\Slot;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SlotController extends BaseController
{
    private $AuthContract;
    private $ClinicContract;
    private $DoctorContract;
    private $PatientContract;
    private $ScheduleContract;
    public function __construct(AuthContract $AuthContract, ClinicContract $ClinicContract, DoctorContract $DoctorContract,  PatientContract $PatientContract, ScheduleContract $ScheduleContract)
    {
        $this->AuthContract = $AuthContract;
        $this->ClinicContract = $ClinicContract;
        $this->DoctorContract = $DoctorContract;
        $this->PatientContract = $PatientContract;
        $this->ScheduleContract = $ScheduleContract;
    }
    public function index($sid, $wid, $date)
    {
        $this->setPageTitle('Slot List');
        $fetchSchedule = Schedule::where('id', $sid)->first();
        return view('admin.slot.index', compact('fetchSchedule','date'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function add(Request $request)
    {
        $this->setPageTitle('Schedule');
        if ($request->isMethod('post')) {
            DB::beginTransaction();
            $isExites = Schedule::where('user_id', $request->doctorId)->where('profile_clinics_id', $request->clinicId)->first();
            try {
                if (isset($isExites) && $isExites != null) {
                    $insertArry = $request->merge(['id' => $isExites->id])->except(['_token', '_method']);
                    $isSchedule = $this->ScheduleContract->updateSchedule($insertArry);
                    $message = 'Schedule Updated Successfully';
                } else {
                    $insertArry = $request->except(['_token', '_method', 'id']);
                    $isSchedule = $this->ScheduleContract->createSchedule($insertArry);
                    $message = 'Schedule Created Successfully';
                }
                if ($isSchedule) {
                    DB::commit();
                    return $this->responseRedirect('admin.schedule.list', $message, 'success', false);
                }
            } catch (\Exception $e) {
                DB::rollBack();
                logger($e->getMessage() . '--' . $e->getFile() . '--' . $e->getLine());
                return $this->responseRedirectBack('Something went wrong', 'error', true);
            }
        }
        return view('admin.slot.add-edit');
    }

    public function edit($id)
    {
        $this->setPageTitle('Slot');
        $fetchSchedule['id'] = $id;
        // $fetchSchedule = Schedule::where('id', $id)->get();
        // dd($fetchSchedule);
        return view('admin.slot.add-edit', compact('fetchSchedule'));
    }
}
