<?php

namespace App\Http\Controllers\DoctorAssigne;

use App\Contracts\Auth\AuthContract;
use App\Contracts\Clinic\ClinicContract;
use App\Contracts\Doctor\DoctorContract;
use App\Contracts\DoctorAssigne\DoctorAssigneContract;
use App\Contracts\Patient\PatientContract;
use App\Contracts\Schedule\ScheduleContract;
use App\Http\Controllers\BaseController;
use App\Models\Schedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class doctorAssigneController extends BaseController
{
    private $AuthContract;
    private $ClinicContract;
    private $DoctorContract;
    private $PatientContract;
    private $ScheduleContract;
    private $DoctorAssigneContract;

    public function __construct(
        AuthContract $AuthContract,
        ClinicContract $ClinicContract,
        DoctorContract $DoctorContract,
        PatientContract $PatientContract,
        DoctorAssigneContract $DoctorAssigneContract,
        ScheduleContract $ScheduleContract
    )
    {
        $this->AuthContract = $AuthContract;
        $this->ClinicContract = $ClinicContract;
        $this->DoctorContract = $DoctorContract;
        $this->DoctorAssigneContract = $DoctorAssigneContract;
        $this->PatientContract = $PatientContract;
        $this->ScheduleContract = $ScheduleContract;
    }
    public function index(Request $request)
    {
        $this->setPageTitle('Doctor Assigne List');
        $fetchData=$this->DoctorAssigneContract->getAll();
        return view('admin.doctor-assigne.index', compact('fetchData'));
    }
    public function add(Request $request)
    {
        $this->setPageTitle('Doctor Assigne Add');
        if ($request->isMethod('post')) {
            $request->validate([
                'clinicId' => 'required',
                'doctorId' => 'required'
            ]);
            DB::beginTransaction();
            $isExites = Schedule::where('user_id',$request->doctorId)->where('profile_clinics_id',$request->clinicId)->first();
            try {
                if (isset($isExites) && $isExites != null) {
                    $insertArry = $request->merge(['id' => $isExites->id ])->except(['_token', '_method']);
                    $isDoctorAssigne =  $this->ScheduleContract->updateSchedule($insertArry);
                    // $isDoctorAssigne = $this->DoctorAssigneContract->doctorAssigneUpdate($insertArry);
                    $message = 'Doctor Assigne Updated Successfully';
                } else {
                    $insertArry = $request->except(['_token', '_method', 'id']);
                    $isDoctorAssigne = $this->ScheduleContract->createSchedule($insertArry);
                    // $isDoctorAssigne = $this->DoctorAssigneContract->doctorAssigneCreate($insertArry);
                    $message = 'Doctor Assigne Created Successfully';
                }
                if ($isDoctorAssigne) {
                    DB::commit();
                    return $this->responseRedirect('admin.assigne.list', $message, 'success', false);
                }
            } catch (\Exception $e) {
                DB::rollBack();
                logger($e->getMessage() . '--' . $e->getFile() . '--' . $e->getLine());
                return $this->responseRedirectBack('Something went wrong', 'error', true);
            }
        }
        return view('admin.doctor-assigne.add-edit');
    }
}
