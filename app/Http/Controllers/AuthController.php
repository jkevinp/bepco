<?php

namespace bepc\Http\Controllers;

use Illuminate\Http\Request;
use bepc\Http\Requests;
use bepc\Http\Controllers\Controller;
use Auth;
use bepc\Models\User;
use Validator;
use bepc\Repositories\Contracts\UserContract;
class AuthController extends Controller
{
    public function __construct(UserContract $uc){
        $this->user = $uc;
    }
    public function index(){
        return view('self.blade.auth.login');
    }
    public function signin(Request $request){
        $input = $request->all();
        $validator = validator::make($input , ['username' => 'required|exists:user' , 'password' => 'required']);
        if(Auth::attempt(['username'=> $input['username'] ,'password'=> $input['password'] , 'activated' => 1])){
            return redirect(route('default.home'));
        }else{
            return redirect()->back()->withErrors('Invalid Credentials or user not active.');
        }
    }
    public function destroy(){
        Auth::logout();
        return redirect(route('default.home'))->with('flash_message' , 'Successfully logged out.');
    }
     public function forgotPassword(){
        return view('self.blade.user.forgotpassword');
    }
    public function resetPassword(Request $request){
        //validate
        $input = $request->all();
        $find = $this->user->search(['id' => $input['id'] , 
                            'username' => $input['username'],
                            'email' => $input['email']])->first();
        if($find){
            return view('self.blade.user.recover')->with('flash_message' ,'Please choose a new password')->withUser($find);
        }
        return redirect()->back()->withErrors('User with the credentials you entered could not be found.');  
    }
    public function updatePassword(Request $request){
        //validate
        //validate 2 passwords
        $input = $request->all();
            if($user = $this->user->find($input['id'])){
                if($this->user->updatePassword($user, $input['password'])){
                    return redirect(route('auth.login'))->with('flash_message' , 'Password has been updated.');
                }

         return redirect()->back()->withErrors('An error occured while saving new password. Please contact web admin.');        
        }
         return redirect()->back()->withErrors('An error occured! No user id found. Please contact web admin.'); 

    }


}
