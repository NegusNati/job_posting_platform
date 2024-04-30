<?php

use App\Http\Controllers\JobController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterUserController;
use App\Http\Controllers\SessionController;
use App\Mail\JobPosted;
use Illuminate\Support\Facades\Mail;




Route::view('/', 'home');
Route::view('/contact', 'contact');

Route::controller(JobController::class)->group(function () {
    Route::get('/jobs', 'index');
    Route::get('/jobs/create', 'create');
    Route::get("/jobs/{job}", 'show');


    // Route::get('/jobs/edit/{job}', 'edit')->middleware(['auth', 'can:edit-job,job']); wen using a Gate
    Route::get('/jobs/edit/{job}', 'edit')
        ->middleware('auth')
        ->can('edit', 'job');
    Route::patch("/jobs/{job}", 'update')
        ->middleware('auth')
        ->can('edit', 'job');
    Route::delete("/jobs/{job}", 'destroy')
        ->middleware('auth')
        ->can('edit', 'job');
    Route::post('/jobs',  'store')
        ->middleware('auth');
});


//Auth
Route::get('/register', [RegisterUserController::class, 'create']);
Route::post('/register', [RegisterUserController::class, 'store']);


Route::get('/login', [SessionController::class, 'create'])->name('login');
Route::post('/login', [SessionController::class, 'store'])->middleware('throttle:login');
Route::post('/logout', [SessionController::class, 'destroy']);
