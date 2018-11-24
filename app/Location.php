<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $guarded = [];

    public function services_a() 
    {
    	return $this->hasMany('App\Service', 'id_location_a', 'id');
    }

    public function services_b() 
    {
    	return $this->hasMany('App\Service', 'id_location_b', 'id');
    }
}
