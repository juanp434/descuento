<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Input;
use App\Models\User;
use App\Models\promotion;
use App\Models\shop;
use App\Models\voucher;
use Auth;
use Session;

class CommerceController extends Controller
{
    function index(){
        $comercios = shop::get();

        return view('comercio/comercios', ['comercios'=>$comercios]);
    }

    function alta(){
    	return view('comercio/nuevo-comercio');
    }

    function store(Request $Request){

    	$user = new User();

        $user->name = $Request->nombre;
        $user->last = $Request->apellido;
        $user->dni = $Request->dni;
        $user->adress = $Request->adress;
        $user->cp = $Request->cp;
        $user->email = $Request->email;
        $user->password = $Request->pass;
        $user->role = 'shop';
        $user->status = '1';

        $shop = new Comercio();

    	$shop->name = $Request->nombre;
    	$shop->email = $Request->email;
        $shop->status = '1';
        $shop->user_id = $user->id;

        $file = $Request->file('image');
        
        $destinationPath= 'images/shops/';
        $extension= $file->getClientOriginalExtension();
        $fileName = rand(11111,99999).'.'.$extension;
        $Request->file('image')->move($destinationPath, $fileName);
        $shop->image = '/images/shops/'.$fileName;
    	
    	$users = User::get();
         $flag= false;
         foreach ($users as $u) {
            if ($u->email == $user->email){
                $flag=true;
            }
         }

         if ($flag){
            $message= 'Mail ya usado, utilice otro mail';
         }
         else{
            $user->save();
            $shop->save();
            $message= 'Comercio Creado'; 
         }

    	return view('message', ['message'=>$message]);
    }

    
}
