<?php

namespace App\Services\Doctor;

use App\Contracts\Doctor\DoctorContract;
use App\Models\ProfileDoctor;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class DoctorService implements DoctorContract
{

    public function createProfile(array $data)
    {
        // dd($data);
        $isUpdateProfile = ProfileDoctor::create([
            'user_id' => $data['userId'],
            'categorie_id' => $data['categoryId'],
            'type' => $data['type'],
            'qualifaction' => $data['qualifaction'],
            'registration_date' => $data['registration_date'],
            'registration_number' => $data['registration_number'],
            'experience' => $data['experience'],
            'description' => $data['description'],
            'consultation_fee' => $data['consultation_fee'],
            'price' => $data['price'],
        ]);
        return $isUpdateProfile;
    }
    public function updateProfile(array $data)
    {
        $isUpdateProfile = ProfileDoctor::where('user_id', $data['userId'])->update([
            'categorie_id' => $data['categoryId'],
            'type' => $data['type'],
            'qualifaction' => $data['qualifaction'],
            'registration_date' => $data['registration_date'],
            'registration_number' => $data['registration_number'],
            'experience' => $data['experience'],
            'description' => $data['description'],
            'consultation_fee' => $data['consultation_fee'],
            'price' => $data['price'],
        ]);
        return $isUpdateProfile;
    }
    function getAll()
    {
        $data = User::with('doctorProfile')->where('type', 'doctor')->get();
        return $data;
    }
    function findId($id)
    {
        $data = User::with('doctorProfile')->where('id', $id)->first();
        return $data;
    }
}
