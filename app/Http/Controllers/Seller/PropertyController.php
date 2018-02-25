<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PropertyController extends Controller
{   
    public function __construct()
    {
        $this->middleware('auth:seller');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $properties = Property::where('seller_id', Auth::user()->id)->get();

        return view('Seller.homepage.showAllProperties')
        ->with(compact('properties'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Seller.homepage.createProperty');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'propertyType' => 'required',
            'price' => 'required',
            'highlights' => 'required',
            'addressText' => 'required',
            'street' => 'required',
            'locality' => 'required',
            'district' => 'required',
            'city' => 'required',
            'state' => 'required',
            'pincode' => 'required',

            'remember' => 'required',
        ]);

        $property = new Property;
        $property->propertyType = $request->propertyType;
        $property->seller_id = Auth::user()->id;
        $property->price = $request->price;
        $property->photo1 = $request->photo1;
        $property->photo2 = $request->photo2;
        $property->photo3 = $request->photo3;
        $property->highlights = $request->highlights;
        $property->sold = 0;
        $property->addressText = $request->addressText;
        $property->locality = $request->locality;
        $property->landmark1 = $request->landmark1;
        $property->landmark2 = $request->landmark2;
        $property->street = $request->street;
        $property->district = $request->district;
        $property->city = $request->city;
        $property->state = $request->state;
        $property->pincode = $request->pincode;
        $property->save();

        return redirect(route('property.index'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('Seller.homepage.viewProfile');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
