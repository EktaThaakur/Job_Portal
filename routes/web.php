<?php

use App\Http\Controllers\ProfileController;
use App\Models\Job;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/job', [JobController::class, 'job']);

Route::get('/about', function () {
    return view('about');
});
Route::get('/contact', function () {
    return view('contact');
});
//create a route  use Jobcontroller for interting dta in job table
Route::post('/create-job', [JobController::class, 'createJob']);
Route::get('/joblist', [JobController::class, 'getjob']);
Route::get('/job_detail/{job_id}', [JobController::class, 'getjobdetail']);
Route::post('/job_application', [JobController::class, 'job_application']);
Route::post('/query_submission', [JobController::class, 'query_submit']);
Route::get('/search', [JobController::class, 'search']);
// Route::get('pagination', [JobController::class, 'pagination']);
// Route::get('/search', [JobController::class, 'search']);
require __DIR__ . '/auth.php';