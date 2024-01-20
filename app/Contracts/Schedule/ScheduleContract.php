<?php

namespace App\Contracts\Schedule;

interface ScheduleContract
{
    public function getAll();
    public function findId($id);
    public function scheduleList($id);
    public function findClinicIdToDoctor($id);
    public function updateSchedule(array $data);
    public function createSchedule(array $data);
    public function createAvailableDay(array $data,$id);
    // public function signup();
    // public function login(array $data, $model);
    // public function logout($guard);
    // public function findEmail(array $data);
    // public function findEmailOrPhone(array $data);
    // public function otpSend(array $data);
}
