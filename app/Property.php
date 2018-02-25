<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
	protected $fillable = [
        'propertyType', 'price', 'photo1', 'photo2', 'photo3', 'highlights', 'sold', 'seller_id', 'address_id',
    ];

    public function address() {
    	return $this->belongsTo(Address::class);
    }

    public function seller() {
    	return $this->belongsTo(Seller::class);
    }
}
