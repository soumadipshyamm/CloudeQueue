<?php

namespace App\Services\Auth;

use App\Contracts\Auth\AuthContract;
use Illuminate\Support\Facades\Auth;


class AuthService implements AuthContract
{

    // public function findEmail(array $data)
    // {
    //     $query = SELF_MODEL::where('email', $data['email'])->first();
    //     return $query;
    // }
}
