<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service;
use App\ServiceType;
use App\User;
use App\Location;
use Carbon\Carbon;

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

    public function createService(Request $request)
    {
        $request->validate([
            'description_a' => 'required|string',
            'address_a' => 'required|string',
            'description_b' => 'required|string',
            'address_b' => 'required|string',
            'service_type' => 'required|string',
            'date_time_required' => 'required|string' ,
            'email' => 'required|string'            
        ]);
        $LocationA=new Location([
            'latitude' => '0',
            'longitude' => '0',
            'address' => $request->address_a,
        ]);
        $LocationB=new Location([
            'latitude' => '0',
            'longitude' => '0',
            'address' => $request->address_b,
        ]);
        $LocationB->save();
        $LocationA->save();
        $date= Carbon::parse($request->date_time_required);
        $date=$date->format('y/m/d h:i:s');
        $user = User::select('id')->where('email', $request->email)->get();
        $servicetype = ServiceType::where('name', $request->service_type)
               ->get();
        $Service=new Service([
            'id_user'=>$user[0]->id,
            'description_a' => $request->description_a,
            'id_location_a' =>  $LocationA->id,
            'description_b' => $request->description_b,
            'id_location_b' => $LocationB->id,
            'id_service_type' => $servicetype[0]->id,
            'date_time_required' => $date    
        ]);

        $Service->save();
  
    }


}
