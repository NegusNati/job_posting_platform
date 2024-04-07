<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/about', function () {

    return view('about');

});


Route::get('/contact', function(){
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

