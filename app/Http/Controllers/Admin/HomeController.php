<?php

namespace App\Http\Controllers\Admin;

use App\Adminlog;
use App\Http\Controllers\Controller;
use App\Property;
use App\Seller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    
    public function index() {
        $sellers = Seller::orderBy('id', 'desc')->take(5)->get();
        $properties = Property::orderBy('id', 'desc')->take(5)->get();
        $users = User::orderBy('id', 'desc')->take(5)->get();

        $sellerCount = Seller::all()->count();
        $propertyCount = Property::all()->count();
        $userCount = User::all()->count();

    	return view('Admin.homepage.home')
        ->with(compact('sellers'))
        ->with(compact('properties'))
        ->with(compact('users'))
        ->with(compact('sellerCount'))
        ->with(compact('propertyCount'))
        ->with(compact('userCount'));
    }

    protected function guard()
    {
        return Auth::guard('admin');
    }

    public function saveNote(Request $request) {
        $admin = Auth::user();
        $admin->notes = $request->notes;
        $admin->save();

        return redirect()->back();
    }

    public function showLogs() {
        $adminlogs = Adminlog::all();

        return view('Admin.homepage.adminLogs')
        ->with(compact('adminlogs'));
    }
}
