<?php

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::resource('users', 'UserController');

Route::resource('roles', 'RoleController');

Route::resource('permissions', 'PermissionController');

Route::resource('posts', 'PostController');

// Route::get('/create_role_permission', function(){

//     $role = Role::create(['name' => 'Administer']);
//     $permission = Permission::create(['name' => 'Administer roles & permissions']);

//     auth()->user()->assignRole('Administer'); /*method to assigns roke to a user*/
//     auth()->user()->givePermissionTo('Administer roles & permissions'); /*method to allows us to give permission to a user or role*/
// });

// Clients
Route::resource('clients','ClientsController');
Route::get('/clients/data','ClientsController@data')->name('clients.data');

// Rooms
Route::resource('rooms','RoomController');

// Bookings
Route::resource('booking','BookingController');
// Cancel Bookings
Route::post('booking/{room_id}/{booking_id}','BookingController@cancel')->name('booking.cancel');

// Canceled Bookings
Route::get('bookings/canceled','BookingController@canceledBookings')->name('booking.canceled');

// Sessions
Route::get('/login','SessionsController@create')->name('login');
Route::post('/login','SessionsController@store');
Route::get('/logout','SessionsController@destroy');

// UserProfile
 Route::get('/userprofile','UserProfileController@index');
// Route::get('foo', function () {
//     return 'Hello World';
// });
//Route::view('/userprofile', 'user.index');

// User
//Route::get('/user','UserController@index');
