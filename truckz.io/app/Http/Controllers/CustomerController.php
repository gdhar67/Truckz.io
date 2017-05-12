<?php
namespace App\Http\Controllers;

use App\user_truck;
use App\User;
use App\booking_request;
use App\journey_plan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class customerController extends Controller
{

	public function postViewBookingRequest(Request $request)
	{
		$id = $request['id'];
		$user= User::where('id', $id)->first();
		if($user->type != "customer")
		{
			return response()->json("Access denied",401);
		}

		$booking_requests = booking_request::where('users_id',$id)->get();

		if($booking_requests->first())	
		{
			return response()->json($booking_requests,200);
		}

		return response()->json("No booking request submitted",200);

	}

	public function postViewJourneyPlan(Request $request)
	{
		$id = $request['id'];
		$user= User::where('id', $id)->first();
		if($user->type != "customer")
		{
			return response()->json("Access denied",401);
		}

		$id1 = $request['id1'];
		$journey_plan = journey_plan::where('booking_request_id',$id1)->first();
		if($journey_plan)	
		{
			return response()->json($journey_plan,200);
		}
		
		return response()->json("No journey plan submitted for this booking Request",200);

	}

	public function postRejectJourneyPlan(Request $request)
	{
		$id = $request['id'];
		$user= User::where('id', $id)->first();
		
		if($user->type != "customer")
		{
			return response()->json("Access denied",401);
		}

		$id1 = $request['id1'];
		$journey_plan= journey_plan::where('id', $id1)->first();
		$journey_plan->status="rejected";

		return response()->json("Success",200);	
	}

	public function postAcceptJourneyPlan(Request $request)
	{
		$id = $request['id'];
		$user= User::where('id', $id)->first();
		if($user->type != "customer")
		{
			return response()->json("Access denied",401);
		}
		
		$id1 = $request['id1'];
		$journey_plan= journey_plan::where('id', $id1)->first();
		if($journey_plan->status != "pending")
			return response()->json("You have already responded to the journey plan already",200);	
					
		$journey_plan->status="accepted";
		$journey_plan->update();

		$booking_id = $journey_plan->booking_request_id;
		$truck_id= $journey_plan->truck_id;
		$booking_request= booking_request::where('id', $booking_id)->first();
		$user_truck= user_truck::where('id', $truck_id)->first();

		$max_weight = $user_truck->max_weight;
		$max_volume = $user_truck->max_volume;
		$weight = $booking_request->total_weight;
		$volume = $booking_request->total_volume;

		$user_truck->percent_weight_left -= ( $weight / $max_weight ) * 100;
		$user_truck->percent_volume_left -= ( $volume / $max_volume ) * 100;
		$user_truck->update();

		return response()->json("Success",200);
	}

	
	

}