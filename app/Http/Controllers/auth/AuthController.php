<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function loginPage()
    {
        return view('back_office.auth.login');
    }


    public function registerPage()
    {
        return view('back_office.auth.register');

    }


}
