<?php
namespace App\Http\Controllers;

use App\truck_detail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class apiController extends Controller
{

	public function postInputData(Request $request)
	{
		$n=$request['maxno'];

		for($i=0;$i<$n;$i++)
		{
				$name=$request['data.'.$i.'.name'];
				$weight=$request['data.'.$i.'.weight'];
				$volume=$request['data.'.$i.'.volume'];
		
		
				$truck_detail = new truck_detail();
				$truck_detail->truck_name=$name;
				$truck_detail->max_weight=$weight;
				$truck_detail->max_volume=$volume;
				$truck_detail -> save();
		}
		
		return response()->json("success",200);

	}

}