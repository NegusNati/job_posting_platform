<?php

use Illuminate\Support\Facades\Route;
use App\Models\Job;



Route::get('/', function () {
    return view('home');
});

Route::get('/jobs', function () {
    $jobs = Job::with('employer')->latest()->paginate(80); //loding data with eager loading insted of lazy loading
    return view('jobs.index',  [
        "jobs" => $jobs
    ]);
});

Route::get('/jobs/create', function () {
    return view('jobs.create');
});

// Always put the route with a wildcard at the end of the similar routes
Route::get("/jobs/{id}", function ($id) {
    $job = Job::find($id);

    return view('jobs.show', ['job' => $job]);
});

Route::post('/jobs', function () {
    // dd(request()->all); to get all the input values and the csrf token
    // dd(request('salary'));
    request()->validate(
        [
            'title' => ['required', 'string', 'min:4'],
            'salary' => ['required', 'numeric', 'min:4'],
            'description' => ['required', 'min:10'],
        ]
    );


    Job::create([
        'employer_id' => 1,
        'title' => request('title'),
        'salary' => request('salary'),
        'description' => request('description'),
    ]);
    return redirect('/jobs');
});


Route::get('/contact', function () {
    return view('contact');
});



//reciving params from URL and echoing them back
// Route::get('/about/{id}', function ($id) {
//     return ' the Id is : ${id} ';
// });

//named route can be used with route() helper method and pass URL params to the view
// Route::get('/about/{id}', function ($id) {
//     return view('about', ['id' => $id]);
// })->name('yes');
