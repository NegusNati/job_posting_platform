<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;

class RegisterUserController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }

    public function store(User $user, Request $request)
    {
       $attributes =  $request->validate(
            [
                'fname' => ['string', 'min:3', 'max:80', 'required'],
                'lname' => ['string', 'min:3', 'max:80', 'required'],
                'email' => ['email', 'required', 'max:30', 'unique:users'],
                'password' => [ 'required', Password::min(6)->symbols()->mixedCase() , 'confirmed'],
            ]
        );

        // dd($attributes);
        // User::create($attributes);

        $user->create([
            'first_name' => $request->input('fname'),
            'last_name' => $request->input('lname'),
            'email'=> $request->input('email'),
            'password' => bcrypt($request->input('password')),
        ]);

        //log them in

        return redirect('/');


    }
}
