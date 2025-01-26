<?php

namespace App\Providers;

use App\Models\Apply;
use App\Models\Job;
use Illuminate\Console\Application;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;

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

        Paginator::useTailwind();

        if (Schema::hasTable('offres')) {
            $jobs = \App\Models\Job::latest()->paginate(6); // Display 9 jobs per page
            view()->share('jobs', $jobs);
        }

        // if (Schema::hasTable('applies')) {
        //     $applications = \App\Models\Apply::with('job')->latest()->get();
        //     view()->share('applications', $applications);
        // }


        if (Auth::check()) {
            $candidateJobApplications = Application::where('user_id', Auth::user()->id)->count();

            view()->share('candidateJobApplications', $candidateJobApplications);
        }
    }
}
