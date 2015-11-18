<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class SessionsController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function postLogin(Request $request)
    {
        $this->validate($request, [
           'email' => 'required',
           'password' => 'required'
        ]);

        if(Auth::attempt($this->getCredintials($request)))
        {
            flash('You are now confirmed. Please login.');
        }

        return redirect()->intended('/dashoboard');
    }

    public function logout()
    {
        Auth::logout();
        flash('You have now been signed out.');
        redirect('login');
    }
}
