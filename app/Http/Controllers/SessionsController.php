<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class SessionsController extends Controller
{
    public function login()
    {

    }

    public function postLogin()
    {

    }

    public function logout()
    {
        Auth::logout();
        flash('You have now been signed out.');
        redirect('login');
    }
}
