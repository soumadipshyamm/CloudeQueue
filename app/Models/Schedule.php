<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\AsArrayObject;
use Illuminate\Database\Eloquent\Casts\Json;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Webpatser\Uuid\Uuid;

class Schedule extends Model
{
    use HasFactory;
    protected $guarded = [];

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->uuid = (string) Uuid::generate(4);
        });
    }
    protected $casts = [
        'schedule' => AsArrayObject::class,
    ];

    public function profileClinic():BelongsTo
    {
        return $this->belongsTo(ProfileClinic::class,'profile_clinics_id');
    }
    public function users()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }

}
