<?php

namespace Hotrush\SpatieBackup;

use Illuminate\Support\ServiceProvider as BaseServiceProvider;

class TelegramNotificationsServiceProvider extends BaseServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'laravel-backup-tg-notifications');
    }
}