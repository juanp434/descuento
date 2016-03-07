<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\User;
use App\Models\promotion;
use App\Models\shop;
use App\Models\voucher;
use Auth;
use Session;

class UserController extends Controller
{
    function index(){
        $promotions = promotion::orderBy('created_at','name')->limit(4)->get();

        
    	return view('index', ['promotions'=>$promotions]);
    }

    function register(){
    	return view('auth/register');
    }

    function login(){
    	return view('auth/login');
    }
    function store(Request $Request){

    	 $user = new User();

    	 $user->name = $Request->nombre;
    	 $user->last = $Request->apellido;
    	 $user->dni = $Request->dni;
    	 $user->street = $Request->calle;
    	 $user->number = $Request->numero;
    	 $user->cp = $Request->cp;
    	 $user->email = $Request->email;
    	 $user->password = $Request->pass;
         $user->admin = '0';
         $user->status = '0';

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
    	 	$message= 'Usuario Creado';	
    	 }

    	return view('action', ['message' =>$message]);
    	
    }

    function enter(Request $Request){
    	$users = User::get();


    	$email= $Request->email;
    	$pass = $Request->pass;

    	//buscar en users
    	//buscar en comercios


    	return redirect('/');
    }
}
