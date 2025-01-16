<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class JobController extends Controller
{
    // public function programming()
    // {
    //     // Retrieve all jobs
    //     $jobs = Job::all();

    //     // Pass the jobs to the view
    //     return view('pages.programing', ['jobs' => $jobs]);
    // }


    public function details($jobId)
    {
        // Retrieve the job by ID
        $job = Job::find($jobId);

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





    public function search(Request $request)
    {
        $query = Job::query();

        if ($request->filled('search')) {
            $query->where('title', 'like', "%{$request->search}%");
        }

        if ($request->filled('location')) {
            $query->where('location', 'like', "%{$request->location}%");
        }

        // Paginate the results
        $jobs = $query->paginate(10);

        return view('welcome', compact('jobs', 'request'));
    }


    public function filterByCategory($category)
    {
        // Fetch jobs that match the specified category
        $jobs = Job::where('category', $category)->paginate(10);  // Change 10 to your desired number of items per page

        // Return the filtered jobs to the appropriate view
        return view('welcome', ['jobs' => $jobs, 'category' => $category]);
    }




}
