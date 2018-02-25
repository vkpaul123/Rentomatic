<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
	protected $fillable = [
        'addressText', 'locality', 'landmark1', 'landmark2', 'street', 'district', 'city', 'state', 'pincode', 
    ];

    public function property() {
    	return $this->hasOne(Property::class);
    }
}
