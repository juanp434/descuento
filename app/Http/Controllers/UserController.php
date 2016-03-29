<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\User;
use App\Models\promotion;
use App\Models\shop;
use App\Models\voucher;
use App\Models\liquidation;
use Auth;
use Session;
use DateTime;
use DB;

class UserController extends Controller
{
    function index(){
        if (Auth::check()) {
            if (Auth::user()->role == "admin"){
                return redirect('admin');
            }elseif (Auth::user()->role == "shop") {
                return redirect('shop');
            }
        }
        $promotions = promotion::where('status',1)->orderBy('created_at','name')->limit(4)->get();
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
        return view('index', ['promotions'=>$promotions]);
    }

    function indexAdmin(){
        $users = user::where('role','user')->count();
        $shops = user::where('role','shop')->count();
        $liquidations = liquidation::where('estado','PENDIENTE')->get();
        $monto=0;
        foreach ($liquidations as $liquidation) {
            $monto += $liquidation->Monto;
        }

        return view('index-admin', ['users'=>$users, 'shops'=>$shops, 'monto'=>$monto]);
    }

    function indexShop(){
        $vouchers = voucher::get();
        $array = array();
        foreach ($vouchers as $voucher) {
            $start = DATE_FORMAT($voucher->created_at,"Y-m-d H:i:s");
            $end = date("Y-m-d H:i:s");
            $d_start = new DateTime($start);
            $d_end = new DateTime($end);
            $diff = $d_start->diff($d_end);
            
            if ($diff->format('%d') <= 7){//Agregar user
                if (isset($array[$voucher->user_id]))
                    $array[$voucher->user_id][] =  $voucher->user_id;
                else
                    $array[$voucher->user_id] =  array($voucher->user_id);
            }
        }
        $count=0;
        foreach ($array as $key ) {
           $count++;
        }

        $promotions = DB::table('vouchers')
                        ->join('promotions', 'vouchers.promotion_id', '=', 'promotions.id')
                        ->groupby('promotions.id')
                        ->get();
        $vouchers = voucher::get();
        
        $saldo=0;
        foreach ($promotions as $promotion) {
            $cont=0;
            foreach ($vouchers as $voucher) {
               if ($voucher->promotion_id == $promotion->id) {
                   $cont+= $promotion->final;
               }
            }
            $saldo+=$cont;
        }

        $user= Auth::user()->id;
        $shop = shop::where('user_id', $user)->get();

        
        $ranking = DB::table('promotions')
                    ->join('vouchers','vouchers.promotion_id','=','promotions.id')
                    ->select('*',DB::raw('count(promotion_id) as voucher_count'))
                    ->groupby('promotion_id')
                    ->where('shop_id', $shop[0]->id)
                    ->orderBy('voucher_count','desc')
                    ->get();

        return view('index-shop', ['users'=>$count, 'saldo'=>$saldo, 'ranking'=>$ranking,'ini'=>'1']);
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

    	 $user->name = $Request->name;
    	 $user->last = $Request->last;
    	 $user->dni = $Request->dni;
    	 $user->street = $Request->adress;
    	 $user->cp = $Request->cp;
    	 $user->email = $Request->email;
    	 $user->password = bcrypt($Request->password);
         $user->role = 'user';
         $user->status = '0';
         $user->save();
         
        return view('action', ['message' =>'Usuario Creado']);
    }

    function Comercio(){
        
        return view('comercio/nuevo-comercio');
    }

    function storeComercio(Request $Request){
         $user = new User();

         $user->name = $Request->name;
         $user->last = $Request->last;
         $user->dni = $Request->dni;
         $user->adress = $Request->adress;
         $user->cp = $Request->cp;
         $user->email = $Request->email;
         $user->password = bcrypt($Request->password);
         $user->role = 'shop';
         $user->status = '0';
         $user->save();

         $id = user::max('id');

         $shop = new shop();
         
         $shop->name = $Request->name;
         $shop->email = $Request->email;
         $shop->status = '0';
         $shop->user_id = $id;

        $file = $Request->file('image');
        
        $destinationPath= 'images/shops/';
        $extension= $file->getClientOriginalExtension();
        $fileName = rand(11111,99999).'.'.$extension;
        $Request->file('image')->move($destinationPath, $fileName);
        $shop->image = '/images/shops/'.$fileName;
         
        $shop->save();
         
        return view('action', ['message' =>'Comercio Creado']);
    }
}
