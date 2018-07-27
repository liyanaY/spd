<?php

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

/* 
// Default route
Route::get('/', function () { /* :: - static == sama function dengan -> eg: $route->object
    return view('welcome'); /* return file welcome.blade.php (dalam folder view) kalau dia dalam folder, cth folder home, jadi home.welcome
}); 
*/

Route::get('/', 'PortalController@index')->name('index');
//Route::get('/user/sesiAdd', 'UserController@sesiAdd')->name('user.sesiAdd');

// User route
//Route::get('/user', 'UserController@index')->name('index'); // Ctrl+Shift+D - Duplicate file to new line
Route::get('/user/login', 'UserController@login')->name('user.login');
Route::get('/user/register', 'UserController@register')->name('user.register');
Route::get('/user/logout', 'UserController@logout')->name('user.logout');

//Route::get('/user/index', 'UserController@index')->name('user.index');
Route::post('/user/register', 'UserController@registerPost')->name('user.register.post');
Route::post('/user/login', 'UserController@loginPost')->name('user.login.post');

// Authentication Link

Route::middleware(['auth'])->group(function(){
	Route::get('/user', 'UserController@dashboard')->name('user.dashboard');
	
	Route::resource('sesi', 'SesiController')->middleware('role:admin');
	Route::resource('pencalonan', 'PencalonanController');

	/*
	Route::resources([
		'sesi' => 'SesiController',
		'pencalonan' => 'PencalonanController'
	])->middleware(role:admin);
	*/
});