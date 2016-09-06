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
        $users= User::where('role', 'user')->get();
        $id = Shop::where('user_id', Auth::user()->id)->first()->id;
        $promotions = promotion::where('shop_id', $id)->get();
        //dd($promotions);
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
        $id = Auth::user()->id;
        $vouchers = voucher::where('user_id', $id)->get();

        return view('voucher/lista-vouchers', ['vouchers'=>$vouchers, 'head'=>'Comprobantes']);
    }

    function listaVouchers(){
        $vouchers = voucher::orderBy('user_id')->get();
        return view('voucher/lista-vouchers', ['vouchers'=>$vouchers, 'head'=>'Comprobantes']);
    }

    function listaLiquidacion(){

        $promotions = DB::table('promotions')
                        ->join('vouchers', 'vouchers.promotion_id', '=', 'promotions.id')
                        ->groupby('promotions.id')
                        ->get();
        
        $liquidations = liquidation::get();
        $array = array();
        foreach ($liquidations as $liquidation) {
            foreach ($promotions as $promotion) {
                if ($promotion->id != $liquidation->promotion_id) {
                     array_push($array, $promotion);
                   }
                }
            }
        if (!isset($liquidations[0])){
            $array= $promotions;
        }
        return view('liquidaciones/nueva-liquidacion', ['promotions'=>$array]);
    }

    function altaLiquidacion(Request $req){

        $id = $req->select;

        $promotion = promotion::find($id);
        $vouchers = voucher::where('promotion_id', $promotion->id)->where('denunciado',0)->get();

        $liquidacion = new liquidation;
        $liquidacion->promotion_id = $promotion->id;
        $liquidacion->estado = 'PENDIENTE';
        $cont=1;
        foreach ($vouchers as $voucher) {
            if ($voucher->denunciado == 0) {
                $cont++;
            }
                
        }        

        $liquidacion->Monto = $cont*$promotion->final;
        $liquidacion->shop_id = $promotion->shop_id;
        
        $liquidacion->save();

        return view('action', ['message'=>'Liquidacion generada']);
    }

    function liquidaciones(){
        $i= Auth::user()->id;
        $id = shop::where('user_id', $i)->value('id');
        $liquidations = liquidation::where('shop_id', $id)->get();

        return view('liquidaciones/liquidaciones', ['liquidations'=>$liquidations, 'head'=>'Liquidaciones']);
    }

    function verificarLiquidacion($id){
        $liquidation = liquidation::find($id);

        $liquidation->estado = 'COBRADO';
        $liquidation->update();

        return redirect('/liquidaciones');
    }

    function gastos(){
        $vouchers = voucher::where('denunciado','<>',0)->where('descargo','<>','')->orderBy('user_id')->get();
        return view('voucher/lista-vouchers', ['vouchers'=>$vouchers, 'head'=>'Gastos Denunciados']);
    }
    function estimar($id){
        $voucher = voucher::find($id);
        $voucher->denunciado = 1;
        $voucher->descargo= 'estimado';
        $voucher->update();
        return redirect('/lista-gastos-denunciados');
    }
    function desestimar($id){
        $voucher = voucher::find($id);
        $voucher->denunciado = 0;
        $voucher->descargo= 'desestimado';
        $voucher->update();
        return redirect('/lista-gastos-denunciados');
    }

    function GastosDenuncias(){//Traer solo las que pertencen al comercio
        $i= Auth::user()->id;
        $id = shop::where('user_id', $i)->value('id');

        $promotions = promotion::where('shop_id', $id)->get();

        $vouchers = voucher::where('denunciado',1)->where('descargo','')->get();
        $array = array();
        foreach ($promotions as $promotion) {
            foreach ($vouchers as $voucher) {
                if ($promotion->id == $voucher->promotion_id)
                    array_push($array, $voucher);
            }
        }
        
       return view('voucher/nuevo-descargo',['vouchers'=>$array]);
    }

    function GastosDescargo($id, Request $req){
       $voucher = voucher::find($id);
       
       $voucher->descargo = $req->text;
       $voucher->update();

       return redirect('/gastos-denunciados');
    }

    function DenunciasDesestimar($id){
        $voucher = voucher::find($id);

        return redirect('/lista-vouchers');
    }
}
