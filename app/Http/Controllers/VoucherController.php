<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Models\User;
use App\Models\promotion;
use App\Models\shop;
use App\Models\voucher;
use Auth;
use Session;

class VoucherController extends Controller
{
    function index(){
        
    	return redirect('/');
    }

    function store($id){
    	$promotion = promotion::find($id);

        $voucher = new voucher;
        $voucher->user_id = $promotion->user_id;
        $voucher->promotion_id = $promotion->id;
        $voucher->denunciado = '0';
        $voucher->save();

    	return view('message', ['message'=>'Promocion comprada']);
    }
}
