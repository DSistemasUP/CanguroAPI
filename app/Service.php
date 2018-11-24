<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
	protected $guarded = [];

	public function service_type() 
	{
		return $this->belongsTo('App\ServiceType', 'id_service_type', 'id');
	}

	public function user() 
	{
		return $this->belongsTo('App\User', 'id_user', 'id');
	}

	public function location_a() 
	{
		return $this->belongsTo('App\Location', 'id_location_a', 'id');
	}

	public function location_b() 
	{
		return $this->belongsTo('App\Location', 'id_location_b', 'id');
	}
}