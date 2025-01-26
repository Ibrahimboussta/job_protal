<?php

namespace App\Http\Controllers;

use App\Models\Apply;
use App\Models\Job;
use Carbon\Carbon;
use Illuminate\Console\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CandidatController extends Controller
{
    //

    public function index()
    {
        // Retrieve all jobs
        $jobs = Job::all();
        // Pass the jobs to
        return view('pages.candidat.candidat', ['jobs' => $jobs]);
    }


    public function myApplications()
    {

        // Retrieve all applications for the authenticated user

        $applications = Auth::user()->applications()->get();
        // Pass the job to the view
        return view('pages.candidat.myapplications', compact('applications'));
    }



    public function statistiques()
    {
        // Get all job applications grouped by month

        $users = Auth::user()->applications()
            ->selectRaw('MONTH(created_at) as month, COUNT(*) as count')
            ->groupBy('month')
            ->orderBy('month')
            ->get();

    // Get the months from the query results
    $userMonths = $users->pluck('month');
    $userCounts = $users->pluck('count');

    // Initialize an array for all months (1 to 12)
    $allMonths = collect(range(1, 12));

    // Merge the data and fill missing months with count 0
    $labels = $allMonths->map(function ($month) {
        return Carbon::create()->month($month)->format('F');  // Get the month name
    });

    // Fill missing months with 0 count if no data exists
    $data = $allMonths->map(function ($month) use ($userMonths, $userCounts) {
        return $userMonths->contains($month) ? $userCounts[$userMonths->search($month)] : 0;
    });

    return response()->json([
        'labels' => $labels,
        'data' => $data,
    ]);
    }
}
