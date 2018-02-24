<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class CheckIfLoggedInController extends Controller
{
    public function checkRegistration($email) {
    	$user = User::where('email', $email)->get()->first();

    	if($user == null)
    		return 0;
    	else
    		return 1;
    }
}
