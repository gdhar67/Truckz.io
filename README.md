# Truckz.io
## **A basic API - Truck booking for parcel service


### SERVER USED

- Laravel Framework
- Version 5.1.28

-----------------------------------------------------------------------------------

### SERVER ROUTES

#### /api/guest/postregister
- A Post request.
- Used to create a user.
- Takes 5 parameters namely
	- username
	- name
	- email
	- password
	- type

-----------------------------------------------------------------------------------

#### /api/user/postlogin
- A Post request.
- Used to log In user.
- Takes 2 parameters namely
	- username
	- password

-----------------------------------------------------------------------------------

#### /api/user/logout
- A Get request.
- Used to log out user.

-----------------------------------------------------------------------------------

#### /api/user/ownerhomepage
- A Post request.
- Used to display booking request in "owner" homepage.
- Takes 1 parameter namely
	- id (user id)

-----------------------------------------------------------------------------------

##### /api/inputdata
- A Post request.
- Used to enter default truck details.
- Takes 4 parameters namely
	- Number of truck details you wish to enter
	- truck name
	- max weight
	- max volume

		- Input Post Request Format :
			- maxno : 2
			- data[0][truck_name] : xxxx
			- data[0][max_weight] : xxx
			- data[0][max_volume] : xxx
			- data[1][truck_name] : xxxx
			- data[1][max_weight] : xxx
			- data[1][max_volume] : xxx

-----------------------------------------------------------------------------------

##### /api/input/ownertrucks
- A Post request.
- Used to enter user(owner) truck details.
- Takes 6 parameters namely
	- Number of truck details you wish to enter
	- truck name
	- max weight
	- max volume
	- Number plate
	- Current city

		- Input Post Request Format :
			- maxno : 2
			- data[0][truck_name]   : xxxx
			- data[0][max_weight]   : xxx
			- data[0][max_volume]   : xxx
			- data[0][numberplate]  : xxx
			- data[0][current_city] : xxx
			- data[1][truck_name]   : xxxx
			- data[1][max_weight]   : xxx
			- data[1][max_volume]   : xxx
			- data[1][numberplate]  : xxx
			- data[1][current_city] : xxx

-----------------------------------------------------------------------------------

##### /api/customer/postbookingrequest
- A Post request.
- Used to enter a Booking Request by customer.
- Takes 14 parameters namely
	- user id
	- booking request id
	- source
	- destination
	- pickup date
	- pickup time
	- dropoff date
	- dropoff time
	- no of items
	- item name
	- item weight
	- item height
	- item length
	- item breadth

		- Input Post Request Format :
			- id           : xx (user id)
			- id1          : xx (booking request id)
			- source       : xxx
			- destination  : xxx
			- pickup_date  : yyyy-mm-dd
			- pickup_time  : hh-mm-ss
			- dropOff_date : yyyy-mm-dd
			- dropoff_time : hh-mm-ss
			- no_of_items  : 2 
			- item[0][name]    : xxxx
			- item[0][weight]  : xxx
			- item[0][height]  : xxx
			- item[0][length]  : xxx
			- item[0][breadth] : xxx
			- item[1][name]    : xxxx
			- item[1][weight]  : xxx
			- item[1][height]  : xxx
			- item[1][length]  : xxx
			- item[1][breadth] : xxx

-----------------------------------------------------------------------------------

##### /api/owner/postjourneyplan
- A Post request.
- Used to enter a Jurney plan by owner.
- Takes 10 parameters namely
	- user id
	- booking request id
	- user truck id (the truck which is going to be used)
	- source
	- destination
	- pickup date
	- pickup time
	- dropoff date
	- dropoff time
	- truck fare

		- Input Post Request Format :
			- id           : xx (user id)
			- id1          : xx (booking request id)
			- id2          : xx (user truck id)
			- space_alloc  : xx (Filled by owner - FULL/PARTIAL)
			- end_to_end   : xx (Filled by owner - YES/NO)
			- source       : xxx
			- destination  : xxx
			- pickup_date  : yyyy-mm-dd
			- pickup_time  : hh-mm-ss
			- dropOff_date : yyyy-mm-dd
			- dropoff_time : hh-mm-ss
			- truck_fare   : xxxxx

-----------------------------------------------------------------------------------
			
##### /api/customeracceptrequest
- A Post request.
- Used to accept a journey plan proposed by a owner.
- Takes 2 parameters namely
	- user id
	- journey plan id

		- Input Post Request Format :
			- id           : xx (user id)
			- id1          : xx (journey plan id)

-----------------------------------------------------------------------------------

##### /api/customerrejectrequest
- A Post request.
- Used to reject a journey plan proposed by a owner.
- Takes 2 parameters namely
	- user id
	- journey plan id

		- Input Post Request Format :
			- id           : xx (user id)
			- id1          : xx (journey plan id)

-----------------------------------------------------------------------------------

##### /api/customer/view/bookingRequest
- A Post request.
- Used to view booking request submitted by the user.
- Takes 2 parameters namely
	- user id

		- Input Post Request Format :
			- id           : xx (user id)

-----------------------------------------------------------------------------------

##### /api/customer/view/journeyplan
- A Post request.
- Used to reject a journey plan proposed by a owner.
- Takes 2 parameters namely
	- user id
	- Booking request id

		- Input Post Request Format :
			- id           : xx (user id)
			- id1          : xx (booking request id)

-----------------------------------------------------------------------------------

##### /api/owner/currentcity
- A Post request.
- Used to get the current of a truck by a owner.
- Takes 2 parameters namely
	- date
	- truck id

		- Input Post Request Format :
			- date         : yyyy-mm-dd (present date)
			- id           : xx (truck id)

-----------------------------------------------------------------------------------


### DATABASES/TABLES 


#### Database : trucks
=================================================================================
##### Table : users
##### Fields
* id
* name
* username
* email
* password
* type
* remember_token
* created_at
* updated_at

=================================================================================

##### Table : user_trucks
##### Fields
* id
* users_id
* truck_name
* max_weight
* max_volume
* number_plate
* percent_volume_left
* percent_weight_left
* current_city
* created_at
* updated_at

=================================================================================

##### Table : truck_details
##### Fields
* id
* truck_name
* max_weight
* max_volume
* created_at
* updated_at

=================================================================================

##### Table : booking_requests
##### Fields
* id
* users_id
* source
* destination
* total_no_of_items
* total_weight
* total_volume
* pickup_date
* pickup_time
* dropoff_date
* dropoff_time
* created_at
* updated_at

=================================================================================

##### Table : items 
##### Fields
* id
* booking_request_id
* item_name
* weight
* height
* length
* breadth
* volume
* created_at
* updated_at

=================================================================================

##### Table : journey_plans 
##### Fields
* id
* users_id
* booking_request_id
* truck_id
* space_allocation
* end_to_end
* source
* destination
* pickup_date
* pickup_time
* dropoff_date
* dropoff_time
* journey_fare
* status
* created_at
* updated_at

-----------------------------------------------------------------------------------


### BUILD INSTRUCTIONS

* Clone the repository into a local folder in your computer.
* Use `git pull` to pull the code from Github.
* Go to the forum Directory from console and use the command `php artisan serve` to start your localhost server.
* Create a database named `trucks`.
* Run the migrations using the command `php artisan migrate`.

			
-----------------------------------------------------------------------------------

#### Truck API . 