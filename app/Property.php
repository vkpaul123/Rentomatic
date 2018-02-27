<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Property extends Model
{	
	use Searchable;

	public function searchableAs()
    {
        return 'properties';
    }

	protected $fillable = [
        'propertyType', 'price', 'photo1', 'photo2', 'photo3', 'highlights', 'sold', 'seller_id', 'addressText', 'locality', 'landmark1', 'landmark2', 'street', 'district', 'city', 'state', 'pincode', 'lat', 'lang',
    ];

    public function seller() {
    	return $this->belongsTo(Seller::class);
    }
}
