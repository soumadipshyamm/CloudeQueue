<?php

namespace App\Services\Subscription;

use App\Contracts\Subscription\SubscriptionContract;
use App\Models\Schedule;
use App\Models\Subscription;

class SubscriptionService implements SubscriptionContract
{
    function findId($id)
    {
        return Schedule::find($id);
    }
    function getAll()
    {
        return Subscription::where('is_active', 1)->get();
    }
    function updateSchedule(array $data)
    {
        $isCreate = Subscription::where('id', $data['id'])->update([
            'name' => $data['name'],
            'free_subscription' => $data['free_subscription']?? 0,
            'payment_mode' => $data['payment_mode'],
            'duration' => $data['duration'],
            'amount' => $data['amount'],
            'trial_period' => $data['trial_period'],
        ]);
        return $isCreate;
    }
    function createSubscription(array $data)
    {
        // dd($data);
        $isCreate = Subscription::create([
            'name' => $data['name'],
            'free_subscription' => $data['free_subscription']?? 0,
            'payment_mode' => $data['payment_mode'],
            'duration' => $data['duration'],
            'amount' => $data['amount'],
            'trial_period' => $data['trial_period'],
        ]);
        return $isCreate;
    }
}
