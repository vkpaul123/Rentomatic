<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Meeting;
use App\Property;
use App\User;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function getAllProperties() {
    	$properties = Property::where('sold', '=', '0')->get();

    	return $properties->toJson();
    }

    public function setNewMeetingStatus($userId, $propertyId) {
    	$meeting = new Meeting;
    	$meeting->user_id = $userId;
    	$meeting->property_id = $propertyId;
    	$meeting->status = "pending";
    	$meeting->save();

    	return 1;
    }

    public function setCurrentMeetingStatus($meetingId, $status) {
    	$meeting = Meeting::find($meetingId);
    	$property = Property::find($meeting->property_id);
    	if($status == "sold") {
    		if($property->sold == 1) {
    			return 0;
    		} else {

	    		$meeting->status = $status;

	    		$meeting->save();

	    		$property->sold = 1;
	    		$property->save();
    		}
    	} elseif ($status == "revoked") {
    		if($property->sold == 0) {
    			return 0;
    		} else {
	    		$meeting->status = $status;

	    		$meeting->save();

	    		$property->sold = 0;
	    		$property->save();
	    	}
    	}
		$meeting->status = $status;
		$meeting->save();
    	return 1;
    }

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

    public function getProperty($property_id) {
    	$property = Property::find($property_id);

    	return $property->toJson();
    }
}
