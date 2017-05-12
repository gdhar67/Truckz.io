<?php
namespace App\Http\Controllers;

use App\booking_request;
use App\journey_plan;
use App\User;
use App\user_truck;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class journeyPlanController extends Controller
{

	public function postJourneyPlan(Request $request)
	{
		$id = $request['id'];
		$user= User::where('id', $id)->first();
		
		if($user->type != "owner")
		{
			return response()->json("Access denied",401);
		}

			$id1 = $request['id1'];
			$id2 = $request['id2'];
			$booking_request = booking_request::where('id', $id1)->first();
			$user_truck = user_truck::where('id',$id2)->first();

			$required_volume = ( $booking_request->total_volume / $user_truck->max_volume ) * 100;
			$required_weight = ( $booking_request->total_weight / $user_truck->max_weight ) * 100;

			if($user_truck->percent_volume_left < $required_volume)
				return response()->json("The truck you selected has no space",422);

			if($user_truck->percent_weight_left < $required_weight)
				return response()->json("The truck you selected will be overloaded",422);			

			$space_allocation = $request['space_allocation'];
			$end_to_end   = $request['end_to_end'];
			$source       = $request['source'];
			$destination  = $request['destination'];
			$pickup_date  = $request['pickup_date'];
			$pickup_time  = $request['pickup_time'];
			$dropoff_date = $request['dropoff_date'];
			$dropoff_time = $request['dropoff_time'];
			$truck_fare   = $request['truck_fare'];


			$Journey_plan = new journey_plan();
			$Journey_plan->users_id=$id;
			$Journey_plan->booking_request_id=$id1;
			$Journey_plan->truck_id=$id2;
			$Journey_plan->source=$source;
			$Journey_plan->destination=$destination;
			$Journey_plan->space_allocation=$space_allocation;
			$Journey_plan->end_to_end=$end_to_end;
			$Journey_plan->pickup_date=$pickup_date;
			$Journey_plan->pickup_time=$pickup_time;
			$Journey_plan->dropoff_date=$dropoff_date;
			$Journey_plan->dropoff_time=$dropoff_time;
			$Journey_plan->journey_fare=$truck_fare;
			$Journey_plan->status="Pending";
			$Journey_plan->save();

			return response()->json("success",200);
		

	}
	
}