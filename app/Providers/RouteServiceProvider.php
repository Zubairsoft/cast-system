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
     * The path to the "home" route for your application.
     *
     * Typically, users are redirected here after authentication.
     *
     * @var string
     */
    public const HOME = '/home';

    /**
     * Define your route model bindings, pattern filters, and other route configuration.
     *
     * @return void
     */
    public function boot()
    {
        $this->configureRateLimiting();
        $this->dashboardRouteMap();
        $this->apiRouteMap();
        $this->webRouteMap();
        $this->companyRouteMap();
        $this->homeRouteMap();
    }

    protected function apiRouteMap()
    {
        Route::middleware('api')
            ->prefix('api/' . 'v' . config('app.version'))
            ->group(base_path('routes/api.php'));
    }

    protected function dashboardRouteMap()
    {
        Route::prefix('api/' . 'v' . config('app.version'))
            ->middleware('api')
            ->group(base_path('routes/dashboard.php'));
    }

    protected function webRouteMap()
    {
        Route::middleware('web')
            ->group(base_path('routes/web.php'));
    }
    /**
     * Configure the rate limiters for the application.
     *
     * @return void
     */
    protected function configureRateLimiting()
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });
    }

    protected function companyRouteMap()
    {
        Route::prefix('api/' . 'v' . config('app.version'))
            ->middleware('api')
            ->group(base_path('routes/company.php'));
    }

    
    private function homeRouteMap(): void
    {
        Route::name('home.')->middleware(['auth:sanctum', 'api'])
            ->prefix('api/' . 'v' . config('app.version') . '/home')
            ->group(base_path('routes/home.php'));
    }
}
