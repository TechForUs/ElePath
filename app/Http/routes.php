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


//Route::auth();


Route::get('login', 'Auth\AuthController@showLoginForm');
Route::post('login', 'Auth\AuthController@login');
Route::get('logout', 'Auth\AuthController@logout');

// Registration Routes... removed!
//Route::get('register', 'Auth\AuthController@showRegistrationForm')
//Route::post('register', 'Auth\AuthController@register')

// Password Reset Routes...
Route::get('password/reset/{token?}', 'Auth\PasswordController@showResetForm');
Route::post('password/email', 'Auth\PasswordController@sendResetLinkEmail');
Route::post('password/reset', 'Auth\PasswordController@reset');



Route::get('/home', 'HomeController@index');

//for admins  only.
Route::get('admin',function(){
echo "only admins have access";
})->middleware('admin');

//this will output the user registration form
//only admins are allowed to access this.
Route::get('createuser',function(){
     return view('userregistry');
})->middleware('admin');;

//this will create an admin or user . only admins are allowed
//to create new users.
Route::post('createuser', function(Request $request) {
   $user =  new App\Users;
   $user->name = Request::input('name');
   $user->password =  Hash::make(Request::input('password'));
   $user->email = Request::input('email');
   $bool =  Request::input("admin")==1 ? true : false;
   $user->admin = $bool;
   echo $user;
   $user->save();
   echo "done";
})->middleware('admin');



//this will create a default admin ,
//run the app and make a request to this url

Route::get('defaultadmin', function(Request $request) {
   $user =  new App\Users; 
   $user->name = "admin";
   $user->password =  Hash::make("dh67cl");
   $user->email = 'madushanka.priyamal@yahoo.com';
   $bool =   true;
   $user->admin = $bool;
   echo $user;
   $user->save();
   echo "done";
});