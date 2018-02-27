<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Adminlog extends Model
{
    protected $fillable = [
        'user_id', 'user_type', 'ip_address',
    ];
}
