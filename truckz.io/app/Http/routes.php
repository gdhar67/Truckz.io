<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});



Route::post('/api/user/ownerhomepage',[ 
'uses'=> 'ownerController@getOwnerHomepage',
'as' => 'OwnerHomepage'
]);

Route::get('/api/user/logout', [
'uses' => 'userController@getLogout',
'as' => 'logout'
]);

Route::post('/api/guest/postregister',[ 
'uses'=> 'userController@postRegister',
'as' => 'register'
]);

Route::post('/api/user/postlogin',[
'uses' => 'userController@postLogin',
'as' => 'login'
]);

Route::post('/api/inputdata',[
'uses' => 'apiController@postInputData',
'as' => 'inputdata'
]);

Route::post('/api/input/ownertrucks',[
'uses' => 'ownerController@postInputOwnerData',
'as' => 'inputuserdata'
]);

Route::post('/api/customer/postbookingrequest',[
'uses' => 'bookingRequestController@postBookingRequest',
'as' => 'postBookingRequest'
]);

Route::post('/api/owner/postjourneyplan',[
'uses' => 'journeyPlanController@postJourneyPlan',
'as' => 'postJourneyPlan'
]);

Route::post('/api/customeracceptrequest',[ 
'uses'=> 'customerController@postAcceptJourneyPlan',
'as' => 'accept'
]);

Route::post('/api/customerrejectrequest',[ 
'uses'=> 'customerController@postRejectJourneyPlan',
'as' => 'reject'
]);

Route::post('/api/customer/view/bookingRequest',[ 
'uses'=> 'customerController@postViewBookingRequest',
'as' => 'ViewBookingRequest'
]);

Route::post('/api/customer/view/journeyplan',[ 
'uses'=> 'customerController@postViewJourneyPlan',
'as' => 'ViewJourneyPlan'
]);

Route::post('/api/owner/currentcity',[
'uses' => 'ownerController@postCurrentCity',
'as' => 'postCurrentCity'
]);