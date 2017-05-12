<?php
namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class userController extends Controller
{

	public function postRegister(Request $request)
	{
		
		$validator = Validator::make($request->all(), [
			'username' => 'required|max:20|unique:users',
			'email' => 'required|max:120',
			'name' => 'required|max:20',
			'password' => 'required|min:8',
			
		]);

		if ($validator->fails()) 
		{    
   			return response()->json($validator->messages(), 200);
		}


		$username=$request['username'];
		$email=$request['email'];
		$name=$request['name'];
		$type=$request['type'];
		$password=bcrypt($request['password']);


		$user = new User();
		$user->username=$username;
		$user->email=$email;
		$user->name=$name;
		$user->type=$type;
		$user->password=$password;
		$user -> save();

		Auth::login($user);

		if($user->type == "owner")
			return response()->json("successfully logged into owner page",200);

		return response()->json("successfully logged into customer page",200);


	}

	public function postLogin(Request $request)
	{

		$validator = Validator::make($request->all(), [
			'username' => 'required|max:20',
			'password' => 'required|min:8'
		]);

		if ($validator->fails()) 
		{
			return response()->json($validator->messages(), 200);
		}


		if(Auth::attempt( ['username' => $request['username'],  'password' =>$request['password'] ,'type' => "owner"]))
		{
			return response()->json("successfully logged into owner page",200);
		}

		if(Auth::attempt( ['username' => $request['username'],  'password' =>$request['password'] ,'type' => 'customer']))
		{
			return response()->json("successfully logged into customer page",200);
		}

		return response()->json("Invalid Username or password",401);
	

	}

	public function getLogout()
	{
		return response()->json("Logged out successfully",200);
	}
	

}