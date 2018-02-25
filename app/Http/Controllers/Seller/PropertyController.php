<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

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

        return view('Seller.homepage.Property.showAllProperties')
        ->with(compact('properties'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Seller.homepage.Property.createProperty');
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

        if($request->hasFile('photo1')) {
            $fileName = "property_pic_1_".Auth::user()->id.".".$request->photo1->getClientOriginalExtension();

            if($request->photo1->getClientOriginalExtension() == 'png')
                $image = Image::make($request->file('photo1'))->resize(1280, 720)->encode('png');
            else
                $image = Image::make($request->file('photo1'))->resize(1280, 720)->encode('jpg');

            $t = Storage::disk('s3')->put('rentomatica/'.$fileName, (string)$image, 'public');

            $fileName = Storage::disk('s3')->url('rentomatica/'.$fileName);

            $property->photo1 = $fileName;
        }

        if($request->hasFile('photo2')) {
            $fileName = "property_pic_2_".Auth::user()->id.".".$request->photo2->getClientOriginalExtension();

            if($request->photo2->getClientOriginalExtension() == 'png')
                $image = Image::make($request->file('photo2'))->resize(1280, 720)->encode('png');
            else
                $image = Image::make($request->file('photo2'))->resize(1280, 720)->encode('jpg');

            $t = Storage::disk('s3')->put('rentomatica/'.$fileName, (string)$image, 'public');

            $fileName = Storage::disk('s3')->url('rentomatica/'.$fileName);

            $property->photo2 = $fileName;
        }

        if($request->hasFile('photo3')) {
            $fileName = "property_pic_3_".Auth::user()->id.".".$request->photo3->getClientOriginalExtension();

            if($request->photo3->getClientOriginalExtension() == 'png')
                $image = Image::make($request->file('photo3'))->resize(1280, 720)->encode('png');
            else
                $image = Image::make($request->file('photo3'))->resize(1280, 720)->encode('jpg');

            $t = Storage::disk('s3')->put('rentomatica/'.$fileName, (string)$image, 'public');

            $fileName = Storage::disk('s3')->url('rentomatica/'.$fileName);

            $property->photo3 = $fileName;
        }

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
        $property = Property::find($id);

        return view('Seller.homepage.Property.viewProperty')
        ->with(compact('property'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $property = Property::find($id);

        return view('Seller.homepage.Property.editProperty')
        ->with(compact('property'));
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

        $property = Property::find($id);
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

        if($request->hasFile('photo1')) {
            $fileName = "property_pic_1_".Auth::user()->id.".".$request->photo1->getClientOriginalExtension();

            if($request->photo1->getClientOriginalExtension() == 'png')
                $image = Image::make($request->file('photo1'))->resize(1280, 720)->encode('png');
            else
                $image = Image::make($request->file('photo1'))->resize(1280, 720)->encode('jpg');

            $t = Storage::disk('s3')->put('rentomatica/'.$fileName, (string)$image, 'public');

            $fileName = Storage::disk('s3')->url('rentomatica/'.$fileName);

            $property->photo1 = $fileName;
        }

        if($request->hasFile('photo2')) {
            $fileName = "property_pic_2_".Auth::user()->id.".".$request->photo2->getClientOriginalExtension();

            if($request->photo2->getClientOriginalExtension() == 'png')
                $image = Image::make($request->file('photo2'))->resize(1280, 720)->encode('png');
            else
                $image = Image::make($request->file('photo2'))->resize(1280, 720)->encode('jpg');

            $t = Storage::disk('s3')->put('rentomatica/'.$fileName, (string)$image, 'public');

            $fileName = Storage::disk('s3')->url('rentomatica/'.$fileName);

            $property->photo2 = $fileName;
        }

        if($request->hasFile('photo3')) {
            $fileName = "property_pic_3_".Auth::user()->id.".".$request->photo3->getClientOriginalExtension();

            if($request->photo3->getClientOriginalExtension() == 'png')
                $image = Image::make($request->file('photo3'))->resize(1280, 720)->encode('png');
            else
                $image = Image::make($request->file('photo3'))->resize(1280, 720)->encode('jpg');

            $t = Storage::disk('s3')->put('rentomatica/'.$fileName, (string)$image, 'public');

            $fileName = Storage::disk('s3')->url('rentomatica/'.$fileName);

            $property->photo3 = $fileName;
        }

        $property->save();

        return redirect(route('property.index'));
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
