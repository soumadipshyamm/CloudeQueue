<?php

namespace App\Contracts\Auth;

interface AuthContract
{
    public function showProfile($id);
    // public function signup();
    // public function login(array $data, $model);
    // public function logout($guard);
    public function registration(array $data);
    public function updateUser(array $data);
    public function getUserByType($type);
    // public function findEmail(array $data);
    // public function findEmailOrPhone(array $data);
    // public function otpSend(array $data);
    // public function findId($data);
}
