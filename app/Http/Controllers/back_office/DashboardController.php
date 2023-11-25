<?php

namespace App\Http\Controllers\back_office;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {

        return view('back_office.dashboard');
    }
}
