<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Http\Controllers\Auth\Request;
//use App\Http\Requests;
use Auth;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the top

    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
     protected $redirectTo = '/';
     
     protected function authenticated()
    {
        if (Auth::user()->status == '0') {
            Auth::logout();
        }
        if (Auth::check()) {
            if (Auth::user()->role == "user") {
                return redirect()->intended('/');
            }elseif (Auth::user()->role == "shop") {
                return redirect()->intended('shop');
            }else{
                return redirect()->intended('admin');
            } 
            }
            else
                return redirect()->intended('/');

    }
    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:4',
            'dni' => 'unique:users',
            'role' => 'required'
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'last' => $data['last'],
            'dni' => $data['dni'],
            'adress' => $data['adress'],
            'cp' => $data['cp'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'role' => $data['role'],
            'status' => $data['status']
            
        ]);
    }

    
    
   /*public function register(Request $request)
    {
    $validator = $this->validator($request->all());
    if ($validator->fails()) {
    $this->throwValidationException(
    $request, $validator
    );
    }
    Auth::guard($this->getGuard())->login($this->create($request->all()));
    Auth::logout();
    return redirect($this->redirectPath());
    }*/

    
    
}
