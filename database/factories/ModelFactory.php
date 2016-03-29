<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\Models\User::class, function () {
    return [
        'name' => '',
        'last'=>'',
        'dni'=>'',
        'adress'=>'',
        'cp'=>'',
        'email' => '',
        'password' => bcrypt('admin'),
        'role'=>'',
        'status'=>''
    ];
});

$factory->define(App\Models\promotion::class, function () {
    return [
        'name' => '',
        'description' => '',
        'price' => '',
        'final' => '',
        'image' => '',
        'shop_id' => '',
        'status' => '',
        'expDate' => ''
    ];
});

$factory->define(App\Models\shop::class, function () {
    return [
        'name' => '',
        'email' => '',
        'status' => '',
        'image' => '',
        'user_id' => '',
    ];
});

$factory->define(App\Models\voucher::class, function(){
    return [
        'user_id' => '',
        'promotion_id'=>'',
        'denunciado'=>'',
        'descargo'=>'',
    ];
});
