<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

class AuthController extends Controller
{
    //

    public function loginPage(){
        return view('/pages/login', ['error' => '0']);
    }

    public function registerPage(){
        return view('/pages/register');
    }

    public function register(Request $request){

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8'
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'profile_picture' => 'profile.png'
        ]);

        return redirect('/');
    }

    public function login(Request $request){

        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);


        if(Auth::attempt([ 'email' => $request->email,'password' => $request->password])){

            if($request->remember == "on")
            {
               $request->session()->put('key','value');
               $cookie = Cookie::forever('userEmail',$request->email);
            }

            return redirect('/');
        }else{
            return view('/pages/login', ['error' => '1']);
        }
    }

    public function logout(){

        Auth::logout();

        return redirect('/');
    }


}
