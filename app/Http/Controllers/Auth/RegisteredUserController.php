<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'role' => ['required', 'in:Recruter,Candidate'], // Validate role explicitly
            'profile_image' => ['nullable', 'image', 'max:2048'],  // Validate image upload
        ]);


        $imagePath = null;
    // Store image if uploaded
    if ($request->hasFile('profile_image')) {
        $imagePath = $request->file('profile_image')->store('profile_images', 'public');
    }
        


        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
            'profile_image' => $imagePath,
        ]);

        event(new Registered($user));

        Auth::login($user);

        // Attach the job only if a valid job ID is provided
        if ($request->has('job_id')) {
            $user->job()->attach($request->job_id);
        }

        return $request->role === 'Recruter'
            ? redirect()->route('dashboard')->with('success', 'Your account has been created!')
            : redirect()->route('welcome')->with('success', 'Your account has been created!');
    }
}
