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
	Route::get('admin', 'UserController@indexAdmin');
	Route::get('shop', 'UserController@indexShop');

	//VOUCHER == COMPROBANTE
	//INVITE
	
	Route::get('/comercios', 'CommerceController@index');
	Route::get('/promociones', 'PromotionController@index');

	Route::get('/register', 'UserController@register');
	Route::post('/register', 'UserController@store');
	Route::get('/nuevo-comercio', 'UserController@Comercio');
	Route::post('/nuevo-comercio', 'UserController@storeComercio');
	Route::get('/login', 'UserController@login');
	Route::post('/login', 'UserController@enter');
	
	//USER
	Route::get('/vouchers', 'VoucherController@lista');
	Route::get('/Denuncia-voucher/{id}', 'VoucherController@DenunciasIndex');
	
	//Comercios
	
	Route::get('/alta-promocion', 'PromotionController@NewPromotion');
	Route::post('/alta-promocion', 'PromotionController@StorePromotion');

	Route::get('/alta-voucher', 'VoucherController@index');
	Route::post('/alta-voucher', 'VoucherController@store');

	Route::get('/liquidaciones', 'VoucherController@liquidaciones');
	Route::get('/liquidaciones/{id}', 'VoucherController@verificarLiquidacion');

	Route::get('/gastos-denunciados', 'VoucherController@GastosDenuncias');
	Route::post('/gastos-denunciados/{id}', 'VoucherController@GastosDescargo');		

	//ADMIN

	Route::get('/lista-usuarios', 'AdminController@UserIndex');
	Route::get('/Aprovar-usuarios/{id}', 'AdminController@UserAprove');

	Route::get('/lista-comercios', 'AdminController@ShopIndex');
	Route::get('/Aprovar-comercios/{id}', 'AdminController@ShopAprove');

	Route::get('/lista-promociones', 'AdminController@PromotionIndex');
	Route::get('/Aprovar-promociones/{id}', 'AdminController@PromotionAprove');


	Route::get('/alta-comercio', 'CommerceController@alta');
	Route::post('/alta-comercio', 'CommerceController@store');

	Route::get('/lista-vouchers', 'VoucherController@listaVouchers');
	
	Route::get('/lista-gastos-denunciados', 'VoucherController@gastos');
	Route::get('/estimar-voucher/{id}', 'VoucherController@estimar');	
	Route::get('/desestimar-voucher/{id}', 'VoucherController@desestimar');			

	Route::get('/generar-liquidacion', 'VoucherController@listaLiquidacion');
	Route::post('/generar-liquidacion', 'VoucherController@altaLiquidacion');

});	

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session 
| state, CSRF protection, and more.
|
*/
Route::group(['middleware' => 'web'], function () {
    Route::auth();

    Route::get('/home', 'HomeController@index');
});
