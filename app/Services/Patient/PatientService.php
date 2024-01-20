<?php

namespace App\Services\Patient;

use App\Contracts\Patient\PatientContract;
use App\Models\Profile;
use App\Models\role;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PatientService implements PatientContract
{

    public function createProfile(array $data)
    {
        $isCreateClinicProfile = Profile::create([
            'allergy_medicine' => $data['allergy_medicine'],
            'description' => $data['description'],
            'blood_group' => $data['blood_group'],
            'type' => $data['type'],
            'dob' => $data['dob'],
            'user_id' => $data['userId']
        ]);
        return $isCreateClinicProfile;
    }

    public function updateProfile(array $data)
    {
        $isCreateClinicProfile = Profile::where('user_id', $data['userId'])->update([
            'allergy_medicine' => $data['allergy_medicine'],
            'description' => $data['description'],
            'blood_group' => $data['blood_group'],
            'type' => $data['type'],
            'dob' => $data['dob'],
        ]);
        return $isCreateClinicProfile;
    }

    public function showProfile($id)
    {
        $data = User::where('id', $id)->where('type', 'patient')->get();
        return $data;
    }
    function getAll()
    {
        $data = User::with('patientProfile')->where('type', 'patient')->get();
        return $data;
    }
    function findId($id)
    {
        $data = User::with('patientProfile')->where('id', $id)->first();
        return $data;
    }
}
