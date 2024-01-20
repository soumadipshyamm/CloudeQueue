<?php

namespace App\Services\Schedule;

use App\Contracts\Schedule\ScheduleContract;
use App\Models\DoctorsAvailabilities;
use App\Models\Profile;
use App\Models\role;
use App\Models\Schedule;
use App\Models\ScheduleTime;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Exists;

class ScheduleService implements ScheduleContract
{
    function findId($id)
    {
        return Schedule::find($id);
    }
    function getAll()
    {
        return Schedule::where('is_active', 1)->get();
    }
    function updateSchedule(array $data)
    {
        $clinicData = auth()->user()->clinicUser->first()->id ?? null;
        $isCreate = Schedule::where('id', $data['id'])->update([
            'profile_clinics_id' => $data['clinicId'] ?? $clinicData,
            'user_id' => $data['doctorId'],
            'valid_date' => $data['valid_date'] ?? null,
            'schedule' => $data['schedule'] ?? null
        ]);
        return $isCreate;
    }

    function createSchedule(array $data)
    {
        // dd($data);
        $clinicData = auth()->user()->clinicUser->first()->id ?? null;
        $isCreate = Schedule::create([
            'clinics_id' => $data['clinicId'] ?? null,
            'doctor_id' => $data['doctorId'],
            'valid_date' => $data['valid_date'] ?? null,
            'schedule' => $data['schedule'] ?? null,
        ]);
        return $isCreate;
    }
    function createAvailableDay(array $datas, $id)
    {
        // dd($datas);
        $userData =$id->id;
        $data = [
            [ 'clinics_id' => $datas['clinicId'], 'doctor_id' => $datas['doctorId'], 'schedule_id' => $id->id, 'available_day' => 'Sunday',   'created_at' => now(), 'updated_at' => now()],
            [ 'clinics_id' => $datas['clinicId'], 'doctor_id' => $datas['doctorId'], 'schedule_id' => $id->id, 'available_day' => 'Monday',   'created_at' => now(), 'updated_at' => now()],
            [ 'clinics_id' => $datas['clinicId'], 'doctor_id' => $datas['doctorId'], 'schedule_id' => $id->id, 'available_day' => 'Tuesday',   'created_at' => now(), 'updated_at' => now()],
            [ 'clinics_id' => $datas['clinicId'], 'doctor_id' => $datas['doctorId'], 'schedule_id' => $id->id, 'available_day' => 'Wednesday',  'created_at' => now(), 'updated_at' => now()],
            [ 'clinics_id' => $datas['clinicId'], 'doctor_id' => $datas['doctorId'], 'schedule_id' => $id->id, 'available_day' => 'Thursday',   'created_at' => now(), 'updated_at' => now()],
            [ 'clinics_id' => $datas['clinicId'], 'doctor_id' => $datas['doctorId'], 'schedule_id' => $id->id, 'available_day' => 'Friday',   'created_at' => now(), 'updated_at' => now()],
            [ 'clinics_id' => $datas['clinicId'], 'doctor_id' => $datas['doctorId'], 'schedule_id' => $id->id, 'available_day' => 'Saturday',  'created_at' => now(), 'updated_at' => now()]
        ];

        $userData->availabilities()->insert($data);
        dd($userData);
        // if($userData->availabilities->isEmpty()){
        // }
        // dd($datas);

        // $isCreate = new DoctorsAvailabilities();
        // $isCreate->clinics_id = $datas['clinicId'];
        // $isCreate->doctor_id = $datas['doctorId'];
        // $isCreate->schedule_id = $id->id;
        // $isCreate->available_day = $datas['doctorId'];
        // $isCreate->available_from = $datas['available_from'];
        // $isCreate->available_to = $datas['available_to'];
        // $isCreate->total_patient = $datas['available_person'];
        // $isCreate->save();
        // return $isCreate;
    }
    // function createSchedule(array $data)
    // {
    //     $clinicData = auth()->user()->clinicUser->first()->id ?? null;
    //     $isCreate = Schedule::create([
    //         'profile_clinics_id' => $data['clinicId'] ?? $clinicData,
    //         'user_id' => $data['doctorId'],
    //         'valid_date' => $data['valid_date'] ?? null,
    //         'schedule' => $data['schedule'] ?? null,
    //     ]);
    //     return $isCreate;
    // }
    function schdule($data)
    {
        $timeArr = [];
        foreach ($data as $time) {
            $timeArr = $time;
        }
        return $data;
    }
    function time($data)
    {
        $timeArr = [];
        foreach ($data as $time) {
            $timeArr = $time['times'];
        }
    }
    // **********************************************************************
    function findClinicIdToDoctor($id)
    {
        return Schedule::where('profile_clinics_id', $id)->get();
    }
    function scheduleList($id)
    {
        return Schedule::where('user_id', $id)->first();
    }
}


// 'available_from'=>, 'available_to'=>, 'total_patient'=>,
// 'available_from'=>, 'available_to'=>, 'total_patient'=>,
// 'available_from'=>, 'available_to'=>, 'total_patient'=>,
// 'available_from'=>, 'available_to'=>,  'total_patient'=>,
// 'available_from'=>, 'available_to'=>, 'total_patient'=>,
// 'available_from'=>, 'available_to'=>, 'total_patient'=>,
// 'available_from'=>, 'available_to'=>,  'total_patient'=>,