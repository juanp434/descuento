<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Models\User;
use App\Models\promotion;
use App\Models\shop;
use App\Models\voucher;
use App\Models\liquidation;
use Auth;
use Session;
use DB;

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

        return redirect('/vouchers');
    }

    function lista(){
        $vouchers = voucher::get();

        return view('voucher/lista-vouchers', ['vouchers'=>$vouchers, 'head'=>'Comprobantes']);
    }

    function listaLiquidacion(){

        $promotions = DB::table('promotions')
                        ->join('vouchers', 'promotions.id', '=', 'vouchers.promotion_id')
                        ->get();
        
        return view('liquidaciones/nueva-liquidacion', ['promotions'=>$promotions]);
    }

    function altaLiquidacion(Request $req){

        $id = $req->select;

        $promotion = promotion::find($id);
        $vouchers = voucher::where('promotion_id', $promotion->id)->get();

        $liquidacion = new liquidation;
        $liquidacion->promotion_id = $promotion->id;
        $liquidacion->estado = 'PENDIENTE';
        $cont=0;
        foreach ($vouchers as $voucher) {
                $cont++;   
                }        

        $liquidacion->Monto = $cont*$promotion->final;
        $liquidacion->save();

        return view('action', ['message'=>'Liquidacion generada']);
    }

    function liquidaciones(){
        $liquidations = liquidation::get();

        return view('liquidaciones/liquidaciones', ['liquidations'=>$liquidations, 'head'=>'Liquidaciones']);
    }

    function verificarLiquidacion($id){
        $liquidation = liquidation::find($id);

        $liquidation->estado = 'COBRADO';
        $liquidation->update();

        return redirect('/liquidaciones');
    }

    function gastos(){
        $vouchers = voucher::where('denunciado',1)->get();
        

        return view('voucher/lista-vouchers', ['vouchers'=>$vouchers, 'head'=>'Gastos Denunciados']);
    }

    function GastosDenuncias(){
       $vouchers = voucher::where('denunciado',1)->get();

       return view('voucher/nuevo-descargo',['vouchers'=>$vouchers]);
    }

    function GastosDescargo($id){
       $voucher = voucher::find($id);

       $voucher->descargo = $descargo;
       $voucher->update();

       return redirect('/gastos-denunciados');
    }
    

    
}
