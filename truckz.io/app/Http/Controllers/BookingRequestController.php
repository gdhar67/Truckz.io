<?php
namespace App\Http\Controllers;

use App\booking_request;
use App\items;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class bookingRequestController extends Controller
{

	public function postBookingRequest(Request $request)
	{
		$id = $request['id'];
		$id1 = $request['id1'];
		$user= User::where('id', $id)->first();
		if($user->type != "customer")
		{
			return response()->json("Access denied",401);
		}
		
		
			$source = $request['source'];
			$destination = $request['destination'];
			$no_of_items= $request['no_of_items'];
			$pickup_date= $request['pickup_date'];
			$pickup_time= $request['pickup_time'];
			$dropoff_date= $request['dropoff_date'];
			$dropoff_time= $request['dropoff_time'];


			$booking_request = new booking_request();
			$booking_request->users_id=$id;
			$booking_request->source=$source;
			$booking_request->destination=$destination;
			$booking_request->total_no_of_items=$no_of_items;
			$booking_request->pickup_date=$pickup_date;
			$booking_request->pickup_time=$pickup_time;
			$booking_request->dropoff_date=$dropoff_date;
			$booking_request->dropoff_time=$dropoff_time;
			$booking_request->save();

			for($i=0;$i<$no_of_items;$i++)
			{

				$name=$request['item.'.$i.'.name'];
				$weight=$request['item.'.$i.'.weight'];
				$height=$request['item.'.$i.'.height'];
				$length=$request['item.'.$i.'.length'];
				$breadth=$request['item.'.$i.'.breadth'];



						$items = new items();
						$items->booking_request_id=$id1;
						$items->item_name=$name;
						$items->weight=$weight;
						$items->height=$height;
						$items->length=$length;
						$items->breadth=$breadth;
						$volume=$height*$length*$breadth;
						$items->volume=$volume;
						$items->save();

			}

			$total_weight=0;
			$total_volume=0;
			$items = items::where('booking_request_id', $id1)->get();
			foreach ($items as $item) 
			{
				$total_weight+=$item->weight;
				$total_volume+=$item->volume;
			}

			$booking_request= booking_request::where('id', $id1)->first();
			$booking_request->total_volume=$total_volume;
			$booking_request->total_weight=$total_weight;
			$booking_request->update();

			return response()->json("success",200);


	}
	
	

}