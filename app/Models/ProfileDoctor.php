<?php

namespace App\Models;

use Webpatser\Uuid\Uuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProfileDoctor extends Model
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
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function category():BelongsTo
    {
        return $this->belongsTo(Category::class, 'categorie_id', 'id');
    }
}
