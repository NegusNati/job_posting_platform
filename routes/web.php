<?php

use Illuminate\Support\Facades\Route;
use App\Models\Job;


//the home route
Route::get('/', function () {
    return view('home');
});

// displays all jobs
Route::get('/jobs', function () {
    $jobs = Job::with('employer')->latest()->paginate(10); //loding data with eager loading insted of lazy loading
    return view('jobs.index',  [
        "jobs" => $jobs
    ]);
});

// to create new jobs
Route::get('/jobs/create', function () {
    return view('jobs.create');
});

//to edit existing job
Route::get('/jobs/edit/{id}', function ($id) {
    $job = Job::find($id);
    return view('jobs.edit', [
        'job' => $job
    ]);
});

// Route::post('/jobs/edit', function () {
//     // dd(request()->all); to get all the input values and the csrf token
//     // dd(request('salary'));
//     request()->validate(
//         [
//             'title' => ['required', 'string', 'min:4'],
//             'salary' => ['required', 'digits_between:4,7', 'gt:1000'],
//             'description' => ['required', 'min:10'],
//         ]
//     );
//     dd(request()->all());
//     $job = Job::find(request()->all());

//     $job->update(
//         [
//             'title' => request('title'),
//             'salary' => request('salary'),
//             'description' => request('description'),
//         ]
//     );

//     return redirect('/jobs');
// });

// Always put the route with a wildcard at the end of the similar routes

//update individual job
Route::patch("/jobs/{id}", function ($id) {

    //validation
    request()->validate(
        [
            'title' => ['required', 'string', 'min:4'],
            'salary' => ['required', 'digits_between:4,7'],
            'description' => ['required', 'min:10'],
        ]
    );
    //authorization (on hold....)

    //update individual job
    $job = Job::findOrFail($id);

    //method #1
    // $job->title = request('title');
    // $job->description = request('description');
    // $job->salary = request('salary');
    // $job->save();
    //method #2

    $job->update(
        [
            'title' => request('title'),
            'salary' => request('salary'),
            'description' => request('description'),
        ]
    );

    return redirect("/jobs/".$job->id);

});

//destroy individual job
Route::delete("/jobs/{id}", function ($id) {
    //authorize the request (on hold...)
    //delete the job
    $job = Job::findOrFail($id);
    $job->delete();
    //redirect
    return redirect('/jobs');
});


//show individual job
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
            'salary' => ['required', 'digits_between:4,7'],
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
