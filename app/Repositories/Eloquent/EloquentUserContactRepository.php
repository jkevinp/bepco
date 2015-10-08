<?php namespace bepc\Repositories\Eloquent;
use bepc\Models\User;
use bepc\Models\UserBarcode;
use bepc\Models\UserIdCard;
use bepc\Models\UserContact;
use bepc\Repositories\Contracts\UserContactContract  ;
class EloquentUserContactRepository implements UserContactContract 
{

    public function find($id){
        return UserContact::find($id);
    }
    public function store(User $user,$request){
        $input = $request->all();
        if(!$this->checkParams($input)){
            return UserContact::create($input);
        }
        return false;
    }
    public function checkParams($input){

        return empty($input['phone']) && empty($input['mobile']) && empty($input['facebook']) && empty($input['additionalemail']);
    }
    public function sdelete(UserContact $usercontact){
        $usercontact->delete();
    }
    public function fdelete(UserContact $usercontact){
        $usercontact->forceDelete();
    }
    public function update(UserContact $usercontact , $request){
         $input = $request->all();
        if(!$this->checkParams($input)){
            $usercontact->phone = $input['phone'];
            $usercontact->mobile = $input['mobile'];
            $usercontact->facebook = $input['facebook'];
            $usercontact->additionalemail = $input['additionalemail'];
            return $usercontact->save();
        }
        return false;
    }
    public function search($fields,$param){

    }
    public function all(){
        return UserContact::all();
    }

}