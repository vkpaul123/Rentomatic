<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Meeting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class PropertyMeetingsController extends Controller
{
    public function requestMeeting(Request $request) {
    	$meeting = new Meeting;
    	$meeting->user_id = Auth::user()->id;
    	$meeting->property_id = $request->property_id;
    	$meeting->status = "pending";
    	$meeting->save();

    	Session::flash('messageSuccess', 'Request added Successfully.');
    	return redirect()->back();
    }
}
