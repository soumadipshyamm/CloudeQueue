<?php

namespace App\Contracts\Clinic;

interface ClinicContract
{
    public function getAll();
    public function getAllStaff($data);
    public function findClinicStaff($data);
    // public function login(array $data, $model);
    // public function logout($guard);
    public function createProfile(array $data);
    public function updateProfile(array $data);
    // public function create(array $data);
    // public function findEmail(array $data);
    // public function findEmailOrPhone(array $data);
    // public function otpSend(array $data);
    public function findId($data);
    // public function findClinicById($data);
}
