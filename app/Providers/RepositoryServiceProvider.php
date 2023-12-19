<?php

namespace App\Providers;

use App\Contracts\Auth\AuthContract;
use Illuminate\Support\ServiceProvider;
use App\Models\Permission;
use App\Services\Auth\AuthService;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Gate;

class RepositoryServiceProvider extends ServiceProvider
{
    protected $repositories = [
        AuthContract::class => AuthService::class,

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
