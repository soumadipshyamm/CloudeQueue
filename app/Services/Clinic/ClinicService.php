<?php

namespace App\Services\Clinic;

use App\Contracts\Clinic\ClinicContract;
use App\Models\ProfileClinic;
use App\Models\role;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ClinicService implements ClinicContract
{
    public function createProfile(array $data)
    {
        // dd($data);
        $isCreateClinicProfile = ProfileClinic::create([
            'clinic_name' => $data['clinic_name'],
            'email' => $data['clinic_email'],
            'phone' => $data['clinic_phone'],
            'alt_phone' => $data['clinic_alternative_mobile_no'],
            'long' => $data['clinic_long'],
            'lat' => $data['clinic_lat'],
            'type' => $data['type'],
            // 'schedule' => $data['schedule'],
            // 'profile_images' => $data['clinic_profile_images'],
            'country_id' => $data['country_id'],
            'state_id' => $data['state_id'],
            'city_id' => $data['city_id'],
            'address' => $data['clinic_address'],
            'description' => $data['clinic_description'],
        ]);
        // dd(  $isCreateClinicProfile);
        return $isCreateClinicProfile;
    }
    public function getAll()
    {
        $data = ProfileClinic::with('userClinic')->get();
        return $data;
    }
    public function getAllStaff($uuid)
    {
        // $id = uuidtoid($uuid, 'profile_clinics');
        // $data = ProfileClinic::where('id', $id)->first();
        // return $data;
    }
    public function findId($uuid)
    {
        // dd($uuid);
        $id = uuidtoid($uuid, 'profile_clinics');
        $data = ProfileClinic::where('id', $id)->first();
        return $data;
    }
    public function findClinicStaff($uuid)
    {
        $id=uuidtoid($uuid,'users');
        $data = User::where('id',$id)->first();
        return $data;
    }
    public function findClinicToStaff($uuid)
    {
        $id=uuidtoid($uuid,'users');
        $data = User::where('id',$id)->first();
        return $data;
    }

    public function updateProfile($data)
    {
        $id = uuidtoid($data['uuid'], 'profile_clinics');
        $updateClinicProfile = ProfileClinic::where('id', $id)->update([
            'clinic_name' => $data['clinic_name'],
            'email' => $data['clinic_email'],
            'phone' => $data['clinic_phone'],
            'alt_phone' => $data['clinic_alternative_mobile_no'],
            'long' => $data['clinic_long'],
            'lat' => $data['clinic_lat'],
            'type' => $data['type'],
            // 'schedule' => $data['schedule'],
            // 'profile_images' => $data['clinic_profile_images'],
            'country_id' => $data['country_id'],
            'state_id' => $data['state_id'],
            'city_id' => $data['city_id'],
            'address' => $data['clinic_address'],
            'description' => $data['clinic_description'],
        ]);
        return $updateClinicProfile;
    }
}


// "clinic_name" => "sssssss"
//   "clinic_email" => "super.adssssmin@cloudequeue.com"
//   "clinic_phone" => "1234567890"
//   "clinic_alternative_mobile_no" => "1234567890"
//   "clinic_long" => "23.2345678"
//   "clinic_lat" => "098.876543"
//   "clinic_address" => "1234567890123456789012345678901234567890"
//   "clinic_description" => "1234567890123456789012345678901234567890"
//   "clinic_profile_images" => Illuminate\Http\UploadedFile {#1190 ▶}
//   "schedule" => array:7 [▶]

//   "name" => "labour2"
//   "email" => "testcompany@titanbuilders.com"
//   "password" => "12345678"
//   "phone" => "1234567890"
//   "alternative_mobile_no" => "1234567890"
//   "address" => "1234567890"
//   "type" => "clinic"
//   "parent_id" => null
//   "gender" => "male"
//   "userId" => 9
//   "profile_images" => Illuminate\Http\UploadedFile {#1234 ▶}



// "uuid" => "5322cb1b-11ae-42fa-bda9-7dfafc0a95ec"
// "clinicId" => "1"
// "name" => "labour"
// "email" => "supaaadmin@cloudequeue.com"
// "phone" => "1234567891"
// "alternative_mobile_no" => "1234567890"
// "gender" => "female"
// "address" => "1234567891123456789112345678911234567891"
