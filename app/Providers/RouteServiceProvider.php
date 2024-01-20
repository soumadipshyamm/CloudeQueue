<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to your application's "home" route.
     *
     * Typically, users are redirected here after authentication.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';
    public const HOME = '/home';
    /**
     * Define your route model bindings, pattern filters, and other route configuration.
     */
    public function boot(): void
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });
        $this->routes(function () {
            Route::middleware('api')
                ->prefix('api')
                ->group(base_path('routes/api.php'));
            Route::middleware('web')
                ->group(base_path('routes/web.php'));
        });
        $this->mapAuthRoutes();
        $this->mapAdminRoutes();
        $this->mapAjaxRoutes();
        $this->mapDoctorRoutes();
        $this->mapClinicRoutes();
        $this->mapPatientRoutes();
    }
    protected function mapAuthRoutes()
    {
        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/auth.php'));
    }
    protected function mapAdminRoutes()
    {
        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/admin.php'));
    }
    protected function mapAjaxRoutes()
    {
        Route::middleware('web')
            ->namespace($this->namespace . '\Ajax')
            ->prefix('ajax')
            ->group(base_path('routes/ajax.php'));
    }
    protected function mapDoctorRoutes()
    {
        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/doctor.php'));
    }
    protected function mapClinicRoutes()
    {
        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/clinic.php'));
    }
    protected function mapPatientRoutes()
    {
        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/patient.php'));
    }
}
