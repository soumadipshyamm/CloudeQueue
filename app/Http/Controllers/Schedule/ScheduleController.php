<?php

namespace App\Http\Controllers\Schedule;

use App\Contracts\Auth\AuthContract;
use App\Contracts\Category\CategoryContracts;
use App\Contracts\Clinic\ClinicContract;
use App\Contracts\Doctor\DoctorContract;
use App\Contracts\Patient\PatientContract;
use App\Contracts\Schedule\ScheduleContract;
use App\Http\Controllers\BaseController;
use App\Models\Schedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ScheduleController extends BaseController
{
    private $AuthContract;
    private $ClinicContract;
    private $DoctorContract;
    private $ScheduleContract;

    public function __construct(AuthContract $AuthContract, ClinicContract $ClinicContract, DoctorContract $DoctorContract, ScheduleContract $ScheduleContract)
    {
        $this->AuthContract = $AuthContract;
        $this->ClinicContract = $ClinicContract;
        $this->DoctorContract = $DoctorContract;
        $this->ScheduleContract = $ScheduleContract;
    }
    public function index(Request $request)
    {
        $this->setPageTitle('Schedule List');
        $fetchData = $this->ScheduleContract->getAll();
        return view('admin.schedule-management.index', compact('fetchData'));
        // return view('admin.schedule-management.schedule-list', compact('fetchData'));
    }
    // public function add(Request $request)
    // {
    //     $this->setPageTitle('Schedule');
    //     if ($request->isMethod('post')) {
    //         $request->validate([
    //             'clinicId' => 'required',
    //             'doctorId' => 'required',
    //             'valid_date' => 'required'
    //         ], [], [
    //             'clinicId' => 'Clinic Name',
    //             'doctorId' => 'Doctor Name',
    //             'valid_date' => 'Valid Date'
    //         ]);
    //         DB::beginTransaction();
    //         $isExites = Schedule::where('user_id', $request->doctorId)->where('profile_clinics_id', $request->clinicId)->first();
    //         try {
    //             if (isset($isExites) && $isExites != null) {
    //                 // dd($request->all());
    //                 $insertArry = $request->merge(['id' => $isExites->id])->except(['_token', '_method']);
    //                 $isSchedule = $this->ScheduleContract->updateSchedule($insertArry);
    //                 $message = 'Schedule Updated Successfully';
    //             } else {
    //                 $insertArry = $request->except(['_token', '_method', 'id']);
    //                 // dd($insertArry);
    //                 $isSchedule = $this->ScheduleContract->createSchedule($insertArry);
    //                 $message = 'Schedule Created Successfully';
    //             }
    //             if ($isSchedule) {
    //                 DB::commit();
    //                 return $this->responseRedirect('admin.schedule.list', $message, 'success', false);
    //             }
    //         } catch (\Exception $e) {
    //             DB::rollBack();
    //             logger($e->getMessage() . '--' . $e->getFile() . '--' . $e->getLine());
    //             return $this->responseRedirectBack('Something went wrong', 'error', true);
    //         }
    //     }
    //     return view('admin.schedule-management.add-edit');
    // }
    public function edit($uuid)
    {
        $this->setPageTitle('Edit Schedule');
        $data = $this->ScheduleContract->findId($uuid);
        return view('admin.schedule-management.add-edit', compact('data'));
    }
    public function details($uuid)
    {
        $this->setPageTitle('Schedule Details');
        $fetchData = $this->ScheduleContract->findId($uuid);
        return view('admin.schedule-management.details', compact('fetchData'));
    }

    // *************************************************************************************
    public function add(Request $request)
    {
        $this->setPageTitle('Schedule');
        if ($request->isMethod('post')) {
            DB::beginTransaction();
            try {
                $insertArry = $request->except(['_token', '_method', 'id']);
                $isSchedule = $this->ScheduleContract->createSchedule($insertArry);
                $availableDay = $this->ScheduleContract->createAvailableDay($insertArry,$isSchedule);
                $message = 'Schedule Created Successfully';

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
        return view('admin.schedule-management.add-edit');
    }
    // ****************************************************************************************

    public function doctorScheduleList($uuid)
    {
        $this->setPageTitle('Doctor Schedule List');
        $fetchSchedule = $this->ScheduleContract->scheduleList($uuid);
        return view('admin.schedule-management.schedule-list', compact('fetchSchedule'));
    }
}
