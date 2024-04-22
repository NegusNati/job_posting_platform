<?php

use App\Http\Controllers\JobController;
use Illuminate\Support\Facades\Route;
use App\Models\Job;



Route::view('/', 'home');

Route::controller(JobController::class)->group(function () {
    Route::get('/jobs', 'index');
    Route::get('/jobs/create', 'create');
    Route::get('/jobs/edit/{job}', 'edit');
    Route::patch("/jobs/{job}", 'update');
    Route::delete("/jobs/{job}", 'destroy');
    Route::get("/jobs/{job}", 'show');
    Route::post('/jobs',  'store');
});

// Route::resource('jobs', JobController::class, [
//     // 'only' => ['index', 'show', 'create', 'store']
//     'except' => ['edit']
// ]);


Route::view('/contact', 'contact');




//reciving params from URL and echoing them back
// Route::get('/about/{id}', function ($id) {
//     return ' the Id is : ${id} ';
// });

//named route can be used with route() helper method and pass URL params to the view
// Route::get('/about/{id}', function ($id) {
//     return view('about', ['id' => $id]);
// })->name('yes');
