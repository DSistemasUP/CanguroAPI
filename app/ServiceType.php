<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServiceType extends Model
{
    protected $guarded = [];

    public function services() 
    {
    	return $this->hasMany('App\Service', 'id_service_type', 'id');
    }
}
