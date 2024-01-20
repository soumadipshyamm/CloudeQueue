<?php

namespace App\Services\UserManagment;

use App\Contracts\UserManagment\UserManagmentContract;
use App\Models\Profile;
use App\Models\Role;
use App\Models\Schedule;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Exists;

class UserManagmentService implements UserManagmentContract
{
    function getAllUser()
    {
        return User::where('type','super-admin')->get();
    }
    function getAllRole()
    {
        return Role::where('user_id',auth()->user()->id)->get();
    }
    function createRole(array $data)
    {
        $isCreate = Role::create([
            'name' => $data['role'],
            'user_id' => $data['user_id'],
        ]);
        return $isCreate;
    }
}
