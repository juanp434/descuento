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

    function login(Request $req){
    	return view('auth/login');
    }

    function enter(Request $Request){
        $email= $Request->email;
        $pass = $Request->pass;

        $user = User::where('email',$email)->get();

        var_dump($email, $pass, $user);



        //return redirect('/');
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
         $user->role = 'User';
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

    function Comercio(){
        
        return view('comercio/nuevo-comercio');
    }

    function storeComercio(Request $Request){
         $user = new User();

         $user->name = $Request->nombre;
         $user->last = $Request->apellido;
         $user->dni = $Request->dni;
         $user->street = $Request->calle;
         $user->number = $Request->numero;
         $user->cp = $Request->cp;
         $user->email = $Request->email;
         $user->password = $Request->pass;
         $user->role = 'Shop';
         $user->status = '0';

         $shop = new shop();

         $shop->name = $Request->name;
         $shop->status = '0';
         $shop->image = $Request->image;

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
        return view('action', ['message' =>$message]);
    }
}
