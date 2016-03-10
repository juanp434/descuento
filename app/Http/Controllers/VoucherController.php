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
        $users= User::get();
        $promotions = promotion::get();

    	return view('voucher/nuevo-voucher', ['users'=>$users, 'promotions'=>$promotions]);
    }

    function store(Request $req){
        $voucher = new voucher;
        $voucher->user_id = $req->user;
        $voucher->promotion_id = $req->promotion;
        $voucher->denunciado = '0';
        $voucher->save();

    	return view('action', ['message'=>'Voucher Agregado']);
    }

    function DenunciasIndex(){
        $vouchers = voucher::get();

        return view('voucher/lista-vouchers', ['vouchers'=>$vouchers]);
    }

    function DenunciasDesestimar($id){
        $voucher = voucher::find($id);

        return redirect('/lista-vouchers');
    }
}
