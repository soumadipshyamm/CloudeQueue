<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Webpatser\Uuid\Uuid;
use Carbon\Carbon;
class Subscription extends Model
{
    use HasFactory;

    protected $guarded=[];
    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->uuid = (string) Uuid::generate(4);
        });
    }
    public function getCreatedAtAttribute($created_at)
    {
        return Carbon::parse($created_at)->format('Y-m-d'); // Format as date (YYYY-MM-DD)
    }
}
