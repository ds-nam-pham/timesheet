<?php

namespace App\Providers;

use App\Services\Timesheet\TimesheetService;
use App\Services\Timesheet\TimesheetServiceInterface;
use App\Services\User\UserService;
use App\Services\User\UserServiceInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{

    protected array $applicationServices = [
        TimesheetServiceInterface::class => TimesheetService::class,
        UserServiceInterface::class => UserService::class,
    ];
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
        foreach ($this->applicationServices as $interface => $service) {
            $this->app->bind($interface, $service);
        }
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        
    }
}
