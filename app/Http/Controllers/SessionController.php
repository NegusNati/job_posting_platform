<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    public function create()
    {
        return view("auth.login");
    }
    public function store()
    {

        //validate the form
        $attributes = request()->validate(
            [
                'email' => ['required', 'email'],
                'password' => ['required ', Password::min(6)->symbols()->mixedCase()],

            ]);


        //attempt to login the user
        if(!  Auth::attempt($attributes)){
            throw ValidationException::withMessages([
                'email'=> "Sorry, thoes credentials do not match. Please try again",
            ]);
        }

        //regenerate the session token
        request()->session()->regenerate();


        //redirect
        return redirect("/");
    }
    public function destroy()
    {
        Auth::logout();

        return redirect('/');
    }
}
