<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class TestGetJSONWithURL extends Controller
{
    public function sendValuesOfUser($email)
    {
    	$user = User::where('email', '=',$email)->get();

    	return $user->toJson();
    }
}
