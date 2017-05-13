<?php
namespace App\Http\Controllers;

use App\user_truck;
use App\User;
use App\booking_request;
use App\journey_plan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ownerController extends Controller
{

	public function postInputOwnerData(Request $request)
	{
		$id = $request['id'];
		$user= User::where('id', $id)->first();
		if($user->type != "owner")
		{
			return response()->json("Access denied",401);
		}
			$n=$request['maxno'];
		
				for($i=0;$i<$n;$i++)
				{
						$name=$request['data.'.$i.'.name'];
						$weight=$request['data.'.$i.'.weight'];
						$volume=$request['data.'.$i.'.volume'];
						$numberplate=$request['data.'.$i.'.numberplate'];
						$current_city=$request['data.'.$i.'.current_city'];
				
				
						$user_truck = new user_truck();
						$user_truck->users_id=$id;
						$user_truck->truck_name=$name;
						$user_truck->max_weight=$weight;
						$user_truck->max_volume=$volume;
						$user_truck->number_plate=$numberplate;
						$user_truck->current_city=$current_city;
						$user_truck -> save();

				}
			
			return response()->json("Success",200);

	}

	public function getOwnerHomepage()
	{
		$id = $request['id'];
		$user= User::where('id', $id)->first();
		if($user->type != "owner")
		{
			return response()->json("Access denied",401);
		}

		$booking_request= booking_request::orderBy('created_at','desc')->get();

		if($booking_request->first())
		{
			return response()->json($booking_request,200);
		}

		return response()->json("No booking request found",200);

	}

		public function postCurrentCity(Request $request)
	{
		$date = $request['date'];
		$truck_id = $request['id'];

		$journey_plan = journey_plan::where('truck_id',$truck_id)->where('status',"accepted")->where('pickup_date',$date)->first();
			if($journey_plan)
			{
				$user_truck = user_truck::where('id',$truck_id)->first();
				$user_truck->current_city = $journey_plan->source ;
				$user_truck->update();
				return response()->json($user_truck->current_city,200);
			}
		$journey_plan = journey_plan::where('truck_id',$truck_id)->where('status',"accepted")->where('dropoff_date',$date)->first();
			if($journey_plan)
			{
				$user_truck = user_truck::where('id',$truck_id)->first();
				$user_truck->current_city = $journey_plan->destination ;
				$user_truck->update();
				return response()->json($user_truck->current_city,200);
			}

			$journey_plan = journey_plan::where('truck_id',$truck_id)->where('status',"accepted")->where('pickup_date','<',$date)->where('dropoff_date','>',$date)->first();
			if($journey_plan)
			{
				$user_truck = user_truck::where('id',$truck_id)->first();
				$user_truck->current_city = "Travelling" ;
				$user_truck->update();
				return response()->json($user_truck->current_city,200);
			}

				$user_truck = user_truck::where('id',$truck_id)->first();
				return response()->json($user_truck->current_city,200);

	}
	

}