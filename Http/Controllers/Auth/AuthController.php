<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    public function __construct()
    {
        $this->middleware('guest')->except('getLogout');
    }
    
    public function getLogin(){
        return view('auth.login');
    }

    public function getRegister(){
        return view('auth.register');
    }

    public function getLogout(){
        return view('auth.logout');
    }
    */

    public function showResetForm($token){
        
    }

    public function sendResetLinkEmail(){

    }
}