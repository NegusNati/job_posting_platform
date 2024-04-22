<?php

use App\Http\Controllers\JobController;
use Illuminate\Support\Facades\Route;
use App\Models\Job;



Route::view('/', 'home');

Route::get('/jobs', [JobController::class, 'index']);
Route::get('/jobs/create',[JobController::class , 'create']);
Route::get('/jobs/edit/{job}',[JobController::class, 'edit']);
Route::patch("/jobs/{job}", [JobController::class, 'update']);
Route::delete("/jobs/{job}", [JobController::class, 'destroy']);
Route::get("/jobs/{job}", [JobController::class, 'show']);
Route::post('/jobs', [JobController::class, 'store']);


Route::view('/contact', 'contact');




//reciving params from URL and echoing them back
// Route::get('/about/{id}', function ($id) {
//     return ' the Id is : ${id} ';
// });

//named route can be used with route() helper method and pass URL params to the view
// Route::get('/about/{id}', function ($id) {
//     return view('about', ['id' => $id]);
// })->name('yes');
