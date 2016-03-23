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

class AdminController extends Controller
{
    function UserIndex(){
        $users = User::where('status',0)->where('role','user')->get();
        //pasar los que tinen status 0 solamente

    	return view('admin/lista-usuarios', ['users'=>$users]);
    }

    function UserAprove($id){
        $user = User::find($id);

        $user->status = '1';
        $user->update();

        
        return redirect('/lista-usuarios');
    }

    function ShopIndex(){
        $shops = shop::where('status',0)->get();
        //pasar los que tinen status 0 solamente

    	return view('admin/lista-comercios', ['shops'=>$shops]);
    }

    function ShopAprove($id){
        $shop = shop::find($id);
        $shop->status = '1';
        $shop->update();

        $user = user::find($shop->user_id);
        $user->status = '1';
        $user->update();

        return redirect('/lista-comercios');
    }

    function PromotionIndex(){
        $promotions = promotion::where('status',0)->get();
        //pasar los que tinen status 0 solamente

    	return view('admin/lista-promociones', ['promotions'=>$promotions]);
    }

    function PromotionAprove($id){
        $promotion = promotion::find($id);

        $promotion->status = '1';
        $promotion->update();

        
        return redirect('/lista-promociones');
    }
}
