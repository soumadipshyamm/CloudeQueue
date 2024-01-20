<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory, Sluggable;
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
    public function roles()
    {
        return $this->belongsToMany(Role::class, 'roles_permissions');
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'users_permissions');
    }
}
