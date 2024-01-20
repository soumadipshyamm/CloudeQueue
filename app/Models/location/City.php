<?php

namespace App\Models\location;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class City extends Model
{
    use HasFactory, SoftDeletes;
    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class);
    }
    public function state(): BelongsTo
    {
        return $this->belongsTo(State::class);
    }
}
