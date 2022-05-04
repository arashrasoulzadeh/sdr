<?php

namespace App\Providers;

use App\Contracts\NotificationRepositoryInterface;
use App\Interfaces\NotificationRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
        app()->bind( NotificationRepositoryInterface::class, NotificationRepository::class );
    }
}
