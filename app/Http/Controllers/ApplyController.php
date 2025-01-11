<?php

namespace App\Http\Controllers;

use App\Models\Apply;
use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApplyController extends Controller
{
    /**
     * Show the apply form.
     */
    public function index($jobId)
    {
        // Fetch the specific job based on its ID
        $job = Job::findOrFail($jobId); // Automatically throws 404 if job not found

        return view('pages.apply', compact('job'));
    }

    /**
     * Store a new job application.
     */
    public function store(Request $request, $jobId)
    {
        // Validate the request inputs
        $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:100',
            'resume' => 'required|file|mimes:pdf,doc,docx|max:2048', // Max size 2MB
            'job_id' => 'required|exists:offres,id', // Ensure job exists
        ]);

        // Ensure the user is logged in
        $user = Auth::user();

        // Handle the resume file upload
        $resumePath = $request->file('resume')->store('resumes', 'public');

        // Store the application
        Apply::create([
            'user_id' => $user->id,          // Authenticated user's ID
            'job_id' => $jobId,             // Passed job ID from route
            'full_name' => $request->full_name,
            'email' => $request->email,
            'address' => $request->address,
            'city' => $request->city,
            'resume' => $resumePath,
        ]);


        
        return redirect()->route('welcome')->with('success', 'Application submitted successfully!');
    }

}
