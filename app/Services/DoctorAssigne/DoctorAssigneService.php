<?php

namespace App\Services\DoctorAssigne;

use App\Contracts\Doctor\DoctorContract;
use App\Contracts\DoctorAssigne\DoctorAssigneContract;
use App\Models\ProfileDoctor;
use App\Models\Schedule;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class DoctorAssigneService implements DoctorAssigneContract
{

    public function getAll()
    {
        return Schedule::where('is_active',1)->get();
    }

    public function doctorAssigneCreate(array $data)
    {
        $clinicData = auth()->user()->clinicUser->first()->id ?? null;
        $isCreate = Schedule::create([
            'profile_clinics_id' => $data['clinicId'] ?? $clinicData,
            'user_id' => $data['doctorId'],
            'valid_date' => $data['valid_date'] ?? null,
            'schedule' => $data['schedule'] ?? null,
        ]);
        return $isCreate;
    }

    public function doctorAssigneUpdate(array $data)
    {
        // dd($data);
        $clinicData = auth()->user()->clinicUser->first()->id ?? null;
        $isCreate = Schedule::where('id',$data['id'])->update([
            'profile_clinics_id' => $data['clinicId'] ?? $clinicData,
            'user_id' => $data['doctorId'],
            'valid_date' => $data['valid_date'] ?? null,
            'schedule' => $data['schedule'] ?? null,

        ]);
        return $isCreate;
    }
}
