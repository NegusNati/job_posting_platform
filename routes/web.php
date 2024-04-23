<?php

use App\Http\Controllers\JobController;
use Illuminate\Support\Facades\Route;
use App\Models\Job;



Route::view('/', 'home');
Route::view('/contact', 'contact');

Route::controller(JobController::class)->group(function () {
    Route::get('/jobs', 'index');
    Route::get('/jobs/create', 'create');
    Route::get('/jobs/edit/{job}', 'edit');
    Route::patch("/jobs/{job}", 'update');
    Route::delete("/jobs/{job}", 'destroy');
    Route::get("/jobs/{job}", 'show');
    Route::post('/jobs',  'store');
});





