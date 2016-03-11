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

class PromotionController extends Controller
{
    function index(){
        $promotions = promotion::Paginate(4);

    	return view('promotion/promociones', ['promotions'=>$promotions]);
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
        $promotion->status = '0';

        $promotion->save();
        
        return view('action', ['message'=>'Promocion solicitada']);
    }
}
