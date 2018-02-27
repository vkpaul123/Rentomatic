<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Property;
use App\User;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function getAllProperties() {
    	$properties = Property::where('sold', '=', '0')->get();

    	return $properties->toJson();
    }

    // public function appSignUpPwd($email, $password) {
    // 	$user = new User;
    // 	$user->name = 
    // }

    public function appSignUp($email, $name) {
    	$user = new User;
    	$user->name = $name;
    	$user->email = $email;
    	$user->phno = "000000";
    	$user->password = bcrypt(str_random(40));
    	$user->save();

    	return 1;
    }

    public function appSignUpSeller($email, $name) {
    	$seller = new Seller;
    	$seller->email = $email;
    	$seller->name = $name;

    	$seller->phno = "000000";
    	$seller->adharno = "000000000000";
    	$seller->password = bcrypt(str_random(40));

    	$seller->save();

    	return 1;
    }

    public function getProperty($id) {
    	$property = Property::find($id);

    	return $property->toJson();
    }
}
