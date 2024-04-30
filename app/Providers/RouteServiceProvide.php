<?php

namespace App\Providers;

use App\Http\Controllers\SessionController;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * Define your route model bindings, pattern filters, etc.
     */
    public function boot()
    {
        $this->configureRateLimiting();

        $this->routes(function () {
            // Define your routes here
            Route::post('/login', [SessionController::class, 'store'])->middleware('throttle:login');
        });
    }

    /**
     * Configure the rate limiters for the application.
     */
    protected function configureRateLimiting()
    {   
        RateLimiter::for('login', function (Request $request) {
            return Limit::perMinute(50)->by($request->ip());
            // return Limit::perMinute(2)->response(function () {
            //     return response('You have activated the rate limiter', 429);
            // });
        });
    }
}
