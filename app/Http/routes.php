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
	Route::group(['middleware' => ['UserAuth']], function () {

		Route::get('/vouchers', 'VoucherController@lista');
		Route::get('/Denuncia-voucher/{id}', 'VoucherController@DenunciasIndex');
	});
	//Comercios
	Route::group(['middleware' => ['ShopAuth']], function () {

		Route::get('shop', 'UserController@indexShop');

		Route::get('/alta-promocion', 'PromotionController@NewPromotion');
		Route::post('/alta-promocion', 'PromotionController@StorePromotion');

		Route::get('/alta-voucher', 'VoucherController@index');
		Route::post('/alta-voucher', 'VoucherController@store');

		Route::get('/liquidaciones', 'VoucherController@liquidaciones');
		Route::get('/liquidaciones/{id}', 'VoucherController@verificarLiquidacion');

		Route::get('/gastos-denunciados', 'VoucherController@GastosDenuncias');
		Route::post('/gastos-denunciados/{id}', 'VoucherController@GastosDescargo');		
	});
	//ADMIN
	Route::group(['middleware' => ['AdminAuth']], function () {

		Route::get('admin', 'UserController@indexAdmin');

		Route::get('/lista-usuarios', 'AdminController@UserIndex');
		Route::get('/Aprovar-usuarios/{id}', 'AdminController@UserAprove');
		Route::get('/Eliminar-usuarios/{id}', 'AdminController@UserDelete');

		Route::get('/lista-comercios', 'AdminController@ShopIndex');
		Route::get('/Aprovar-comercios/{id}', 'AdminController@ShopAprove');
		Route::get('/Eliminar-comercios/{id}', 'AdminController@ShopDelete');

		Route::get('/lista-promociones', 'AdminController@PromotionIndex');
		Route::get('/Aprovar-promociones/{id}', 'AdminController@PromotionAprove');
		Route::get('/Eliminar-promociones/{id}', 'AdminController@PromotionDelete');


		Route::get('/alta-comercio', 'CommerceController@alta');
		Route::post('/alta-comercio', 'CommerceController@store');

		Route::get('/lista-vouchers', 'VoucherController@listaVouchers');
		
		Route::get('/lista-gastos-denunciados', 'VoucherController@gastos');
		Route::get('/estimar-voucher/{id}', 'VoucherController@estimar');	
		Route::get('/desestimar-voucher/{id}', 'VoucherController@desestimar');			

		Route::get('/generar-liquidacion', 'VoucherController@listaLiquidacion');
		Route::post('/generar-liquidacion', 'VoucherController@altaLiquidacion');
	});
	Route::auth();
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
