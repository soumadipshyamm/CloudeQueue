<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Contracts\Auth\AuthContract;
use App\Contracts\Clinic\ClinicContract;
use App\Contracts\Doctor\DoctorContract;
use App\Http\Controllers\BaseController;
use App\Contracts\Patient\PatientContract;

class DashboardController extends BaseController
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
    public function index(Request $request)
    {
        $this->setPageTitle('Dashboard');
        $data = auth()->user();
        $clinicUser = $this->AuthContract->getUserByType('clinic');
        $doctorUser = $this->AuthContract->getUserByType('doctor');
        $patientUser = $this->AuthContract->getUserByType('patient');
        return view('admin.dashboard.index', compact('data', 'clinicUser', 'doctorUser', 'patientUser'));
    }
}
