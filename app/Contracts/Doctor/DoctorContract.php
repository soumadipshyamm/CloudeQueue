<?php

namespace App\Contracts\Doctor;

interface DoctorContract
{
    public function getAll();
    // public function login(array $data, $model);
    // public function logout($guard);
    public function createProfile(array $data);
    public function updateProfile(array $data);
    // public function findEmail(array $data);
    // public function findEmailOrPhone(array $data);
    // public function otpSend(array $data);
    public function findId($data);
}
