<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomePageController extends Controller
{
    public function index()
    {
    	return view('WelcomePage.index');
    }
}
