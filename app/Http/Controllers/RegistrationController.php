<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Mailers\AppMailer;


use App\Http\Controllers\Controller;

class RegistrationController extends Controller
{

    public function Register()

    {
        return view('auth.register');
    }


    public function PostRegister(Request $request, AppMailer $mailer)
    {
        $this->validate($request, [
           'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed',
        ]);

        $user = User::create($request->all());


        $mailer->sendEmailConfirmationTo($user);

        flash('Please confirm your email address.');

        return redirect()->back();
    }
}
