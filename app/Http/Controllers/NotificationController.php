<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use App\RequestCustomer;
use App\RequestItem;
use App\AfterAttend;
use App\User;
use Auth;
use DB;
use App\AddsNewVehicles;
use App\AddsNewDrivers;
use App\DriverVehicle;

class NotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $this->middleware(function($request,$next){
        //     if(\Auth::user()->can('view_notification')){
        //         return $next($request);
        //     }
        //     return redirect()->back();
        // });

        $notifications = count(RequestCustomer::where([
            ['status', '=', 'Booked']
        ])
            ->join('users', 'request_customers.customer_id', '=', 'users.id')
            ->select('request_customers.id', 'request_customers.created_at', 'users.first_name')->get());
        return $notifications;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $this->middleware(function($request,$next){
        //     if(\Auth::user()->can('create_notification')){
        //         return $next($request);
        //     }
        //     return redirect()->back();
        //});
           $data =  $request->all();
           $ReqId = $data['requestId'];
           // return $ReqId;

            $i = 0;

            $vehicle =  json_decode($data['vehicles'][0]['vehicleId'],true);
            $i = 0;
            foreach ($data['vehicles'] as $key  => $data_once) {
            // return $data_once;
            $afterattends = new AfterAttend();
            $afterattends->requestcustomer_id = $ReqId;
            $vehicle =  json_decode($data_once['vehicleId'],true);
            $afterattends->vehicle_id = $vehicle['vehicle_id'];
            $afterattends->user_id = \Auth::user()->id;
            $afterattends->attend_description = $data_once['attend_description'];
            $afterattends->driver_id = $data_once['driver_name'];
                if ($afterattends->save()) {
                    $i++;
                }
            }
            if ($i > 0) {
                return 'success';
            } else {
                return 'failed';
            }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $this->middleware(function($request,$next){
        //     if(\Auth::user()->can('show_notification')){
        //         return $next($request);
        //     }
        //     return redirect()->back();
        // });
        $requestcustomer = RequestCustomer::where('id', $id)->first();

        // return $requestitem;
        // if ($requestcustomer) {
        //     if ($requestcustomer->status = "Booked") {
        //         $requestcustomer->status = "Pending";
        //         $requestcustomer->status = "Attended";
        //         $requestcustomer->save();
        //     }
        // }


        // if ($requestcustomer) {
        //     if ($requestcustomer->status = "Booked") {
        //         echo "Booked";
        //     }else if($requestcustomer->status = "Booked") {
        //         echo "Pending";
        //     }else {
        //         echo "Attended";
        //     }
        //     $requestcustomer->save();
        // }


        $feedbacks = RequestCustomer::where('request_customers.id','=',$id)
            ->join('request_items', 'request_items.requestcustomer_id', '=', 'request_customers.id')
            // ->join('trucktypes', 'request_items.truck_id', '=', 'trucktypes.id')
            ->join('containers', 'request_items.container_id', '=', 'containers.id')
            ->join('users', 'request_customers.customer_id', '=', 'users.id')
            ->select(
                'request_customers.id',
                'request_customers.status',
                'users.first_name',
                'users.middle_name',
                'users.last_name',
                'request_items.goods_description',
                'request_items.weight',
                'request_items.number_of_packages',
                // 'trucktypes.truck_name',
                'request_items.origin_point',
                'request_items.destination_point',
                'containers.container_name',
                'request_items.trip_duration',
                'request_items.created_at',
                'request_items.attachments_path'
            )->get();

        // return $feedbacks;

        $vehicles = DB::select(
            "SELECT
            adds_new_vehicles.id as vehicle_id,
            adds_new_drivers.first_name,
            adds_new_drivers.middle_name,
            adds_new_drivers.last_name,
            adds_new_drivers.company_name,


            adds_new_drivers.id as driver_id,
            adds_new_vehicles.plate_horse_number,
            adds_new_vehicles.attachments_path,
            adds_new_vehicles.semi_trailer,
            adds_new_vehicles.created_at,

            trailers.id as trailer_id,
            trailers.trailer_number as trailer_number
        FROM
            adds_new_drivers,
            adds_new_vehicles,
            driver_vehicles,
            trailers,
            trailer_vehicles
        WHERE
        adds_new_drivers.id = driver_vehicles.adds_new_drivers_id
        AND adds_new_vehicles.id = driver_vehicles.adds_new_vehicles_id
        AND trailers.id = trailer_vehicles.trailer_vehicle_id
        AND adds_new_vehicles.id = trailer_vehicles.adds_new_vehicles_id
        ORDER BY adds_new_vehicles.id DESC"
        );

        // return $vehicles;

        $data_vehicle  = array();
        foreach($vehicles as $vehicle){
            $tmp['vehicle_id'] = $vehicle->vehicle_id;
            $tmp['plate_horse_number'] = $vehicle->plate_horse_number;
            $tmp['driver_id'] = $vehicle->driver_id;
            $tmp['first_name'] = $vehicle->first_name;
            $tmp['middle_name'] = $vehicle->middle_name;
            $tmp['last_name'] = $vehicle->last_name;
            $tmp['trailer_id'] = $vehicle->trailer_id;
            $tmp['trailer_number'] = $vehicle->trailer_number;

            if($vehicle->semi_trailer){

                $TrailerData = DB::select(
                    "SELECT
                    trailers.id as trailer_id,
                    trailers.trailer_number as trailer_number,
                    adds_new_vehicles.plate_horse_number,
                    adds_new_vehicles.semi_trailer

                FROM
                    trailers,
                    trailer_vehicles,
                    adds_new_vehicles
                WHERE
                trailers.id = trailer_vehicles.trailer_vehicle_id
                AND adds_new_vehicles.id = trailer_vehicles.adds_new_vehicles_id"
                );

                // return $TrailerData;
                // $tmp['trailer_id'] = $TrailerData[0]->id;
                // $tmp['trailer_number'] = $TrailerData[0]->trailer_number;


            }
            array_push($data_vehicle,$tmp);
        }
        // return $data_vehicle;

        $newdrivers = AddsNewDrivers::all();
        $vehicleSingle = AddsNewVehicles::all();

        // return json_encode($feedbacks);

        return view('manageCustomerRequests.show_request')
            ->with('feedbacks', $feedbacks)
            ->with('vehicles', $data_vehicle)
            ->with('newdrivers', $newdrivers)
            ->with('requestId', $id)
            ->with('vehicleSingle', $vehicleSingle);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // $this->middleware(function($request,$next){
        //     if(\Auth::user()->can('update_notification')){
        //         return $next($request);
        //     }
        //     return redirect()->back();
        // });

        $requestcustomer = RequestCustomer::findOrfail($id);

        //return $requestcustomer;
        if ($requestcustomer) {
            if ($requestcustomer->status == "Booked") {
                $requestcustomer->status = "Attended";
                $requestcustomer->save();
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
