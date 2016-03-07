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
        $promotions = promotion::Paginate(4);

    	return view('user/comercios', ['promotions'=>$promotions]);
    }

    function alta(){
    	return view('user/nuevo-comercio');
    }

    function store(Request $Request){

    	$comercio = new Comercio();

    	$comercio->name = $Request->nombre;
    	$comercio->email = $Request->email;
    	$comercio->password = $Request->pass;

    	
    	$comercios= Comercio::get();
    	$flag= false;
    	foreach ($comercios as $com) {
    		if ($com->email == $comercio->email) {
    			$flag= true;
    		}
    	}
    	if ($flag){
    		$message= 'Comercio existente';
    	}
    	else{
    		$comercio->save();
    		$message= 'Comercio Agregado';
    	}
    	

    	return view('message', ['message'=>$message]);
    }

    function NewPromotion(){


        return view('promotion/alta-promocion');
    }

    function StorePromotion(Request $req){

        $promotion = new promotion();

        $promotion->name = $req->name;
        $promotion->description = $req->description;
        $promotion->price = $req->price;
        $promotion->final = $req->final;
        
        $file = $req->file('image');
        
        $destinationPath= 'images';
        $extension= $file->getClientOriginalExtension();
        $fileName = rand(11111,99999).'.'.$extension;
        $req->file('image')->move($destinationPath, $fileName);
        $promotion->image = '/images/'.$fileName;

        $promotion->shop_id = '1';

        $promotion->save();
        
        return view('action', ['message'=>'Promocion agregada']);
    }
}
