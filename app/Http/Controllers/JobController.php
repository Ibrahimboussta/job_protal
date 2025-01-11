<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class JobController extends Controller
{
    /**
     * Display job details.
     */
    // public function details($jobId)
    // {
    //     // Fetch the job based on the jobId
    //     $job = Job::find($jobId);

    //     // If job not found, handle error (optional)
    //     if (!$job) {
    //         return redirect()->back()->withErrors('Job not found!');
    //     }

    //     // Pass the job to the view
    //     return view('pages.details', compact('job'));
    // }
    public function details($jobId)
    {
        // Check if the job exists, and if it does, retrieve it
        $job = Job::findOrFail($jobId); 
    
        // Pass the job to the view
        return view('pages.details', ['job' => $job]);
    }
    
    

    /**
     * Store a new job (offre) and assign it to the current user.
     */
    public function store(Request $request)
    {
        // Validate the incoming data
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'category' => 'required',
            'location' => 'required',
            'levels' => 'required',
            'salary' => 'required|numeric',
        ]);

        // Check if user is authenticated
        $user = Auth::user();
        if (!$user) {
            return redirect()->route('login')->withErrors('You must be logged in to create a job.');
        }

        // Create the job (offre) entry
        Job::create([
            'title' => $request->title,
            'description' => $request->description,
            'category' => $request->category,
            'location' => $request->location,
            'levels' => $request->levels,
            'salary' => $request->salary,
            'user_id' => $user->id, // Explicitly associate the job with the user
        ]);

        // Redirect to the "manage jobs" page with success
        return redirect()->route('managejobs')->with('success', 'Job created successfully!');
    }
}
