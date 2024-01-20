<?php

namespace App\Models;

use Webpatser\Uuid\Uuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProfileClinic extends Model
{
    use HasFactory;
    protected $guarded = [];
    // protected $casts = [
    //     'schedule' => 'array',
    // ];
    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->uuid = (string) Uuid::generate(4);
        });
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'users_id');
    }
    public function userClinic()
    {
        return $this->belongsToMany(User::class, 'clinics_users','clinic_id','user_id');
    }
    public function schedules():HasMany
    {
        return $this->hasMany(Schedule::class, 'profile_clinics_id','id');
    }
}
