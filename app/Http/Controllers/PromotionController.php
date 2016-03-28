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
use DateTime;

class PromotionController extends Controller
{
    function index(){
        $promotions = promotion::where('status',1)->paginate(4);
        foreach ($promotions as $promotion) {
           $Start = date('Y-m-d');
           $End  = $promotion->expDate;
           
           if ($End > $Start) {
             $dStart = new DateTime($Start);
             $dEnd = new DateTime($End);
             $dDiff = $dStart->diff($dEnd);
             $promotion->days = $dDiff->days;
           }
           else{
              $promotion->days = '0';
           }
           $time = strtotime($promotion->expDate);
           $promotion->expDate = date('d-m-Y',$time); 
        }

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
        $promotion->expDate = $req->myDate;
        
        $file = $req->file('image');
        
        $destinationPath= 'images';
        $extension= $file->getClientOriginalExtension();
        $fileName = rand(11111,99999).'.'.$extension;
        $req->file('image')->move($destinationPath, $fileName);
        $promotion->image = '/images/'.$fileName;

        $id = shop::where('user_id', Auth::user()->id)->value('id');
        $promotion->shop_id = $id;
        $promotion->status = '0';
        
        
        $promotion->save();
        
        return view('action', ['message'=>'Promocion solicitada']);
    }
}
