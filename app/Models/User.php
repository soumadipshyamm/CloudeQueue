<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Webpatser\Uuid\Uuid;
use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Traits\HasRolesAndPermissions as TraitsHasRolesAndPermissions;
use Staudenmeir\LaravelAdjacencyList\Eloquent\HasRecursiveRelationships;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;
    use TraitsHasRolesAndPermissions, HasRecursiveRelationships;

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->uuid = (string) Uuid::generate(4);
            // $model->employee_id = (string) 'EMP-' . random_int(10000000, 90000000);
        });
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'mobile_number',
        'password',
        'mobile_number_verified_at',
        'verification_code',
        'profile_images',
        'type',
        'country_id',
        'state_id',
        'city_id',
        'address',
        'gender',
        'alternative_mobile_no',
        'parent_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'users_roles');
    }
    public function clientProfile()
    {
        return $this->hasOne(ProfileClinic::class);
    }
    public function doctorProfile()
    {
        return $this->hasOne(ProfileDoctor::class);
    }
    public function patientProfile()
    {
        return $this->hasOne(Profile::class);
    }
    public function clinicUser()
    {
        return $this->belongsToMany(ProfileClinic::class, 'clinics_users', 'user_id', 'clinic_id');
    }
    public function schedules(): HasMany
    {
        return $this->hasMany(Schedule::class);
    }
    public function availabilities(): HasMany
    {
        return $this->hasMany(DoctorsAvailabilities::class, 'doctor_id');
    }
    public function getTodaysAvailabilitiesAttribute()
    {
        return $this->availabilities->where('available_day', date('l'));
    }
}
