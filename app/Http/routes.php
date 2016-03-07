<?php
use App\Http\Controllers\Input;

use Illuminate\Http\Request;

use App\Http\Requests;
/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::group(['middleware' => ['web']], function () {
   
	Route::get('/', 'UserController@index');
	Route::get('/register', 'UserController@register');
	Route::post('/register', 'UserController@store');
	Route::get('/login', 'UserController@login');
	Route::post('/login', 'UserController@enter');


	//Comercios
	Route::get('/comercios', 'CommerceController@index');
	Route::get('/alta-comercio', 'CommerceController@alta');
	Route::post('/alta-comercio', 'CommerceController@store');

	

});

Route::get('/alta-promocion', 'CommerceController@NewPromotion');
Route::post('/alta-promocion', 'CommerceController@StorePromotion');



//Users

//voucher

//Promotions

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/


Route::group(['middleware' => 'web'], function () {
    Route::auth();

    Route::get('/home', 'HomeController@index');
});
