<?php

namespace bepc\Http\Controllers;

use Illuminate\Http\Request;
use bepc\Http\Requests;
use bepc\Http\Controllers\Controller;
use Auth;
use bepc\Models\User;
use Validator;
class AuthController extends Controller
{
    public function index(){
        return view('self.blade.auth.login');
    }
    public function signin(Request $request){
        $input = $request->all();
        $validator = validator::make($input , ['username' => 'required|exists:user' , 'password' => 'required']);
        if(Auth::attempt(['username'=> $input['username'] ,'password'=> $input['password']])){

        }else{
            return redirect()->back()->withErrors('Invalid Credentials');
        }
    }
}
