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

    	$comercio = new Comercio();

    	$comercio->name = $Request->nombre;
    	$comercio->email = $Request->email;
    	$comercio->password = $Request->pass;
        $comercio->status = '0';

    	
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

    
}
