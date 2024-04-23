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
    public const HOME = '/home';

    /**
     * Define your route model bindings, pattern filters, and other route configuration.
     */
    public function boot(): void
    {

        /**
         * У файлі routes/web.php ми локально, кожному роутеру, можемо указувати перевірки, для опціональних
         * параметрів маршрутів. Але у випадку з файлом RouteServiceProvider, ми можемо задати налаштування глобально
         * . за допомогою відповідного статичного методу Route::pattern
         *
         * Та у випадку якщо у файлі routes/web.php, перевірок не буде, то ми все одно, будемо мати ці перевірки для
         * опцій на глобальному рівні
         */
        Route::pattern('id', '[\d]+');
        Route::pattern('comments_id', '[\d]+');

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
    }
}
