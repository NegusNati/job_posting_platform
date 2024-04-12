<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home', [
        "jobs" => [
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
        ]
    ]);
});

Route::get('/about', function () {

    return view('about');
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
