<?php

namespace App\Contracts\DoctorAssigne;

interface DoctorAssigneContract
{
    public function getAll();
    // public function login(array $data, $model);
    // public function logout($guard);
    public function doctorAssigneUpdate(array $data);
    public function doctorAssigneCreate(array $data);
    // public function findEmail(array $data);
    // public function findEmailOrPhone(array $data);
    // public function otpSend(array $data);
    // public function findId($data);
}
