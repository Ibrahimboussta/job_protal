<?php

use App\Http\Controllers\AddjobController;
use App\Http\Controllers\ApplicationsController;
use App\Http\Controllers\ApplyController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\ManageJobController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');




Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified', 'role:Recruter'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::get('/job/details/{jobId}', [JobController::class, 'details'])->name('job.details');

Route::get('/addjobs', [AddjobController::class, 'index'])->name('addjobs');
Route::get('/managejobs', [ManageJobController::class, 'index'])->name('managejobs');
Route::get('/applications', [ApplicationsController::class, 'index'])->name('applications');

Route::post('/store', [JobController::class, 'store'])->name('jobs.store');


Route::get('/apply/{jobId}', [ApplyController::class, 'index'])->name('apply');

Route::post('/apply/{jobId}', [ApplyController::class, 'store'])->name('apply.store');


require __DIR__.'/auth.php';
