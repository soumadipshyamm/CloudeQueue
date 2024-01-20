<?php

namespace App\Services\Auth;

use App\Contracts\Auth\AuthContract;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthService implements AuthContract
{
    public function registration(array $data)
    {
        // dd($data);
        if (isset($data['role']) || !empty($data['role'])) {
            $user_role = Role::where('id', $data['role'])->firstOrFail();
        } else {
            $user_role = Role::where('slug', $data['type'])->firstOrFail();
        }
        $profileimg = isset($data['profile_image']) ? $data['profile_image'] : null;
        $profileImgUpload = fileUpload($profileimg, 'uploads');
        $isCreateUser = User::create([
            'mobile_number' => $data['phone'],
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'profile_images' => $profileImgUpload,
            'type' => $data['type'],
            'country_id' => $data['country_id'],
            'state_id' => $data['state_id'],
            'city_id' => $data['city_id'],
            'address' => $data['address'],
            'gender' => $data['gender'],
            'alternative_mobile_no' => $data['alternative_mobile_no'],
            'parent_id' => $data['user_id'] ?? null,
        ]);
        $isCreateUser->roles()->attach($user_role);
        if (isset($data['type']) == 'clinic' || auth()->user()->roles->first()->slug == 'clinic') {
            $isCreateUser->clinicUser()->sync([$data['clinicId'] ?? auth()->user()->clinicUser->first()->id]);
        }
        return $isCreateUser;
    }
    public function updateUser(array $data)
    {
        // dd($data);
        $id = uuidtoid($data['uuid'], 'users');
        $profileimg = isset($data['profile_image']) ? $data['profile_image'] : null;
        $profileImgUpload = fileUpload($profileimg, 'uploads');
        $user_role = Role::where('slug', $data['type'])->firstOrFail();
        $isCreateUser = User::where('id', $id)->update([
            'mobile_number' => $data['phone'],
            'name' => $data['name'],
            'email' => $data['email'],
            'profile_images' => $profileImgUpload,
            'type' => $data['type'],
            'country_id' => $data['country_id'],
            'state_id' => $data['state_id'],
            'city_id' => $data['city_id'],
            'address' => $data['address'],
            'gender' => $data['gender'],
            'alternative_mobile_no' => $data['alternative_mobile_no'],
            'parent_id' => $data['user_id'] ?? null,
        ]);
        // $isCreateUser->roles()->attach($user_role);

        // if ($data['type']=='clinic') {
        //     $isCreateUser->clinicUser()->sync([$data['clinicId']]);
        // }
        return $isCreateUser;
    }
    public function showProfile($id)
    {
        $data = User::where('id', $id)->first();
        return $data;
    }

    public function getUserByType($type)
    {
        $data = User::where('type',$type)->latest()->take(5)->get();
        return $data;
    }
}


// "clinicId" => "10"
//   "name" => "labour"
//   "email" => "sdff.admin@cloudequeue.com"
//   "password" => "12345678"
//   "phone" => "1234567890"
//   "alternative_mobile_no" => "1234567890"
//   "gender" => "female"
//   "address" => "1234567890123456789012345678901234567890"
//   "profile_images" => Illuminate\Http\UploadedFile {#495 ▶}


// role" => "11"
//   "name" => "aaaaaa"
//   "email" => "aaaaaa@asdf.com"
//   "password" => null
//   "phone" => "5432167890"
//   "alternative_mobile_no" => "5432167890"
//   "dob" => "2024-01-05"
//   "blood_group" => "b+"
//   "address" => "sssssssssssssssss"
//   "user_id" => 15
// ]
