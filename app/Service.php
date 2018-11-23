<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
	protected $guarded = [];

	public function service_type() 
	{
		return $this->belongsTo(ServiceType::class);
	}

	public function user() 
	{
		return $this->belongsTo(User::class);
	}

	public function location() 
	{
		return $this->belongsTo(Location::class);
	}
}