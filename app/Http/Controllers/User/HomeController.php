<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Meeting;
use App\Property;
use App\Seller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index() {
    	return view('User.homepage.home');
    }

    public function propertySearchResults() {
    	return view('User.homepage.propertySearchResults');
    }

    public function showAllMeetings() {
        $meetings = Meeting::where('user_id', '=', Auth::user()->id)->get();

        foreach ($meetings as $meeting) {
            $property = Property::find($meeting->property_id);
            $seller = Seller::find($property->seller_id);

            if($meeting->status == "pending" || $meeting->status == "closed" || $meeting->status == "revoked") {
                $meeting->property_id = [
                    'seller' => $seller->name,
                    'property' => $property->propertyType.",<br>".$property->addressText.",<br>".$property->locality.", ".$property->street.",<br>".$property->district.", ".$property->city.",<br>".$property->state." - ".$property->pincode,
                    'price' => $property->price,
                    'id' => $property->id
                ];
            } else {
                $meeting->property_id = [
                    'seller' => $seller->name."<br><b>".$seller->phno."</b><br><a href='mailto:".$seller->email."'>".$seller->email."</a>",
                    'property' => $property->propertyType.",<br>".$property->addressText.",<br>".$property->locality.", ".$property->street.",<br>".$property->district.", ".$property->city.",<br>".$property->state." - ".$property->pincode,
                    'price' => $property->price,
                    'id' => $property->id
                ];
            }
        }

        // return $meetings;

        return view('User.homepage.myMeetings')
        ->with(compact('meetings'));
    }

    public function viewProperty($id) {
        $property = Property::find($id);
        $meeting = Meeting::where('user_id', '=', Auth::user()->id)->where('property_id', '=', $property->id)->where('status', '=', 'pending')->get();
        $existingReq = null;

        if($meeting->count() >= 1)
            $existingReq = 1;

        return view('User.homepage.viewProperty')
        ->with(compact('property'))
        ->with(compact('existingReq'));
    }
}
