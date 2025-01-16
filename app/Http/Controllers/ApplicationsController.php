<?php

namespace App\Http\Controllers;

use App\Models\Apply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApplicationsController extends Controller
{
    //

    public function index()
    {
        // Fetch applications for jobs posted by the logged-in user
        $applications = Apply::whereHas('job', function ($query) {
            $query->where('user_id', Auth::id()); // Filter jobs owned by the logged-in user
        })->get();

        // Return the applications view with the data
        return view('pages.dashboard.applications', compact('applications'));
    }
}
