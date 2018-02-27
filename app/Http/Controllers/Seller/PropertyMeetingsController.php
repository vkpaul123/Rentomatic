<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Meeting;
use App\Property;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PropertyMeetingsController extends Controller
{	
	public function __construct()
    {
        $this->middleware('auth:seller');
    }

    public function showAllMeetings($id) {
    	$meetings = Meeting::where('property_id', '=', $id)->get();

    	foreach ($meetings as $meeting) {
    		$meeting->user_id = User::find($meeting->user_id);
    	}

    	return view('Seller.homepage.Property.showAllRequests')
    	->with(compact('meetings'));
    }

    public function setRequestStatus($id, Request $request) {
    	$meeting = Meeting::find($id);
    	$property = Property::find($meeting->property_id);
    	if($request->applicationStatus[$id] == "sold") {
    		if($property->sold == 1) {
    			Session::flash('messageFail', 'Property already Leased!');
    			return redirect()->back();
    		} else {

	    		$meeting->status = $request->applicationStatus[$id];

	    		$meeting->save();

	    		$property->sold = 1;
	    		Session::flash('messageSuccess', 'Property Leased Successfully.');
	    		$property->save();
    		}
    	} elseif ($request->applicationStatus[$id] == "revoked") {
    		if($property->sold == 0) {
    			Session::flash('messageFail', 'Property already revoked!');
    			return redirect()->back();
    		} else {
	    		$meeting->status = $request->applicationStatus[$id];

	    		$meeting->save();

	    		$property->sold = 0;
	    		Session::flash('messageSuccess', 'Property revoked Successfully.');
	    		$property->save();
	    	}
    	}
		$meeting->status = $request->applicationStatus[$id];
		$meeting->save();
    	return redirect()->back();
    }
}
