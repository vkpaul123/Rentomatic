<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class TestGetJSONWithURL extends Controller
{
    public function sendValuesOfUser($id)
    {
    	$user = User::find($id);

    	return $user->toJson();
    }
}
