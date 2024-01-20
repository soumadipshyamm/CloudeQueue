<?php

namespace App\Contracts\UserManagment;

interface UserManagmentContract
{
    // public function getAll();
    public function getAllUser();
    public function getAllRole();
    // public function findId($id);
    // public function updateSchedule(array $data);
    public function createRole(array $data);
    // public function signup();
    // public function login(array $data, $model);
    // public function logout($guard);
    // public function findEmail(array $data);
    // public function findEmailOrPhone(array $data);
    // public function otpSend(array $data);
}

