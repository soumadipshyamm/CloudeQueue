<?php

namespace App\Providers;

use App\Contracts\Admin\AdminContracts;
use App\Contracts\Auth\AuthContract;
use App\Contracts\Category\CategoryContracts;
use App\Contracts\Clinic\ClinicContract;
use App\Contracts\Doctor\DoctorContract;
use App\Contracts\DoctorAssigne\DoctorAssigneContract;
use App\Contracts\Patient\PatientContract;
use App\Contracts\Schedule\ScheduleContract;
use App\Contracts\Subscription\SubscriptionContract;
use App\Contracts\UserManagment\UserManagmentContract;
use Illuminate\Support\ServiceProvider;
use App\Models\Permission;
use App\Services\Admin\AdminService;
use App\Services\Auth\AuthService;
use App\Services\Category\CategoryService;
use App\Services\Clinic\ClinicService;
use App\Services\Doctor\DoctorService;
use App\Services\DoctorAssigne\DoctorAssigneService;
use App\Services\Patient\PatientService;
use App\Services\Schedule\ScheduleService;
use App\Services\Subscription\SubscriptionService;
use App\Services\UserManagment\UserManagmentService;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Gate;

class RepositoryServiceProvider extends ServiceProvider
{
    protected $repositories = [
        AuthContract::class => AuthService::class,
        AdminContracts::class => AdminService::class,
        PatientContract::class => PatientService::class,
        DoctorContract::class => DoctorService::class,
        ClinicContract::class => ClinicService::class,
        CategoryContracts::class => CategoryService::class,
        ScheduleContract::class => ScheduleService::class,
        DoctorAssigneContract::class => DoctorAssigneService::class,
        SubscriptionContract::class => SubscriptionService::class,
        UserManagmentContract::class => UserManagmentService::class,

    ];
    public function register(): void
    {
        foreach ($this->repositories as $interface => $implementation) {
            $this->app->bind($interface, $implementation);
        }
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
    }
}
