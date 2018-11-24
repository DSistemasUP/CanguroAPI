<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service;
use App\ServiceType;
use App\User;
use App\Location;

class ServiceController extends Controller
{
    //
    /**
     * Retrieve all services
     *
     * 
     * @return  [id] number 
     * @return  [service_type] ServiceType
     * @return  [user] User
     * @return  [location_a] Location
     * @return  [location_b] Location
     * @return  [description_a] String
     * @return  [description_b] String
     * @return  [created_at] TIMESTAMP
     * @return  [updated_at] TIMESTAMP
     * @return  [date_time_required] DATETIME
     */
    public function getAll_Services()
    {
        $services = Service::all();
        $arr_services=array();      
        foreach ($services as $service) {
            array_push($arr_services,         
                ['id' => $service->id,
                 'service_type' => ServiceType::find($service->id_service_type),
                 'user' => User::find($service->id_user),
                 'location_a' => Location::find($service->id_location_a),
                 'description_a' => $service->description_a,
                 'location_b' => Location::find($service->id_location_b),
                 'description_b' => $service->description_b,
                 'created_at'=> $service->created_at,
                 'updated_at'=> $service->updated_at,
                 'date_time_required' => $service->date_time_required
                ]
            );
        }
        return response()->json($arr_services);
    }
}
