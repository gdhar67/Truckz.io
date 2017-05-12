# Truckz.io
## **A basic API - Truck booking for parcel service:stuck_out_tongue_winking_eye:**


### SERVER USED

- Laravel Framework
- Version 5.1.28

-----------------------------------------------------------------------------------

### SERVER ROUTES

### /api/guest/postregister
- A Post request.
- Takes 5 parameters namely
	- username
	- name
	- email
	- password
	- type

##### /guest/register
- registration form is displayed by using this route.

##### /guest/postregister
- SignIn is done using this route.
- The User is Authenticated and redirected to the Homepage where he can view his own posts and the post by other Users.

##### /user/postlogin
- SignIn is done using this route.
- The User is Authenticated and redirected to the Homepage where he can view his own posts and the post by other Users.

##### /user/logout
- User is Logged Out using this route.
- After Logout User is redirected to the Login Page.

##### /user/homepage
- This route is used to access the HomePage.

##### /user/profilepage
- This route is used to access the ProfilePage.

##### /user/searchresults
- This route is used to access the searchresult Page.

##### /user/postsearch
- This route is used to process the text typed in the search box.

##### /user/postSubmitPost
- The posts are submitted by this route when the user posts on his own wall.

##### /userwall/postSubmitPost
- The posts are submitted by this route when the user posts on some other user's wall.

##### /user/postuserwall
- Any other user's wall is displayed using this route.

##### /upateaccount
- The saved changes in the ProfilePage are processed by this route.

##### /userimage/{filename}
- The Profile picture is obtained by this route.

-----------------------------------------------------------------------------------


### DATABASES/TABLES 


#### Database : forum
=================================================================================
##### Table : users
##### Fields
* id
* created_at
* updated_at
* name
* username
* password
* discription
* visibility
* remember_token

=================================================================================

##### Table : posts
##### Fields
* id
* user_id
* created_at
* updated_at
* post
* post_on
* post_by
* remember_token


-----------------------------------------------------------------------------------


### BUILD INSTRUCTIONS

* Clone the repository into a local folder in your computer.
* Use `git pull` to pull the code from Github.
* Go to the forum Directory from console and use the command `php artisan serve` to start your localhost server.
* Create a database named `dbuser`.
* Run the migrations using the command `php artisan migrate`.

			
-----------------------------------------------------------------------------------

#### Enjoy the website. Cheers:smile: