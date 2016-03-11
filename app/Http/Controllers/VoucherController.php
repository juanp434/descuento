<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Models\User;
use App\Models\promotion;
use App\Models\shop;
use App\Models\voucher;
use App\Models\liquidacion;
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

    function DenunciasIndex($id){
        $voucher = voucher::find($id);

        $voucher->denunciado = '1';
        $voucher->update();

        $vouchers= voucher::get();

        return view('voucher/lista-vouchers', ['vouchers'=>$vouchers, 'head'=>'Denunciar Comprobantes']);
    }

    function lista(){
        $vouchers = voucher::get();

        return view('voucher/lista-vouchers', ['vouchers'=>$vouchers, 'head'=>'Comprobantes']);
    }

    function listaLiquidacion(){
        $liquidaciones = liquidacion::get();

        return view('liquidaciones/liquidaciones', ['liquidations'=>$liquidaciones]);
    }

    function liquidacion(){
        $vouchers = voucher::get();

        return view('voucher/lista-vouchers', ['vouchers'=>$vouchers, 'head'=>'Liquidaciones']);
    }

    function gastos(){
        $vouchers = voucher::get();


        $array = new voucher;
        foreach ($vouchers as $voucher) {
            if($voucher->denunciado == 1 ){
                array_push($array, $voucher);
            }
        }

        return view('voucher/lista-vouchers', ['vouchers'=>$array, 'head'=>'Gastos Denunciados']);
    }

    function descargo($id, $descargo){
        $voucher = voucher::find($id);

        $voucher->descargo = $descargo;
        $voucher->update();

        return redirect('/vouchers');
    }
    

    
}
