<?php

namespace App\Contracts\Patient;

interface PatientContract
{
    public function getAll();
    public function showProfile($id);
    public function createProfile(array $data);
    public function updateProfile(array $data);
    // public function signup();
    // public function login(array $data, $model);
    // public function logout($guard);
    // public function findEmail(array $data);
    // public function findEmailOrPhone(array $data);
    // public function otpSend(array $data);
    public function findId($data);
}
