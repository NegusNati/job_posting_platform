<?php

use App\Http\Controllers\JobController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterUserController;



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


//Auth
Route::get('/register', [RegisterUserController::class, 'create']);



