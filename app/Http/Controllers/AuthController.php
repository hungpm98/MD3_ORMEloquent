<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{
    public function showFormRegister(){
        $roles = DB::table('roles')->get();
        return view('backend.Auth.register',compact('roles'));
    }
    public function register(RegisterRequest $request){
        // dd($request);
        $data = $request->only('name','email','password','role_id');
        $data['password'] = Hash::make($data['password']);
        DB::table('users')->insert($data);
        return redirect()->route('showFormLogin');
    }
    public function showFormLogin(){
        if(Auth::check()){ //neu dang co user dang nhap thi chi tra ve index
            return redirect()->route('index');

        }
        return view('backend.Auth.login');


    }
    public function login(LoginRequest $request){
        $data = $request->only('email','password');
        if (Auth::attempt($data)){
            return redirect()->route('index');
        }
        else{
            return redirect()->back();
        }
    }
    public function logout(){
        Auth::logout();
        return redirect()->route('showFormLogin');
    }
}
