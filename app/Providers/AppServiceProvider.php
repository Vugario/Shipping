<?php

namespace App\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;
use App\Services\Contracts\WebshopServiceInterface;
use App\Services\WebshopService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(WebshopServiceInterface::class, function($app)
        {
            $config = config('services.seoshop');
            $user   = Auth::user();

            if (!$user)
            {
                return false;
            }
            
            return new WebshopService(
                new \WebshopappApiClient(
                    $config['env'],
                    $config['key'],
                    md5(Auth::user()->token . $config['secret']),
                    Auth::user()->language
                )
            );
        });
    }
}
