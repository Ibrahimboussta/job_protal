<?php

namespace App\Providers;

use App\Models\Apply;
use App\Models\Job;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //

        $jobs = Job::latest()->get();
        view()->share('jobs', $jobs);


        $applications = Apply::with('job')->latest()->get();
        view()->share('applications', $applications);
    }
}
