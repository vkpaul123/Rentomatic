<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomePageSellerController extends Controller
{
    public function index() {
    	return view('WelcomePageSeller.index');
    }

    public function about() {
    	return view('WelcomePageSeller.about');
    }

    public function contact() {
    	return view('WelcomePageSeller.contact');
    }
}
