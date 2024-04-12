<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Arr;

class Job
{

    public static function all(): array
    {
        return  [
            [
                "id" => 1,
                "name" => "Devloper",
                "description" => "Web Developer, UI/UX Developer",
                "salary" => "60000"
            ],
            [
                "id" => 2,
                "name" => "Product Manager",
                "description" => "Product Lead and Planning",
                "salary" => "70000"
            ],
            [
                "id" => 3,
                "name" => "CTO",
                "description" => "Chief Technology Officer and Engineer",
                "salary" => "100000"
            ],
        ];
    }
}


Route::get('/', function () {
    return view('home');
});

Route::get('/jobs', function () {

    return view('jobs',  [
        "jobs" => Job::all()
    ]);
});

Route::get("jobs/{id}", function ($id) {

    $job =  Arr::first(Job::all(), fn ($job) => $job['id'] == $id);
    // dd($job);
    return view('job', ['job' => $job]);
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
