<?php

namespace App\Contracts\Subscription;

interface SubscriptionContract
{
    public function getAll();
    public function findId($id);
    public function updateSchedule(array $data);
    public function createSubscription(array $data);
    // public function signup();
    // public function login(array $data, $model);
    // public function logout($guard);
    // public function findEmail(array $data);
    // public function findEmailOrPhone(array $data);
    // public function otpSend(array $data);
}
