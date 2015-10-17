<?php namespace bepc\Repositories\Eloquent;
use bepc\Models\User;
use bepc\Models\UserAddress;
use bepc\Repositories\Contracts\UserAddressContract;
class EloquentUserAddressRepository implements UserAddressContract 
{

    public function find($id){
        return UserAddress::find($id);
    }
    public function store(User $user,$request){
        $input = $request->all();
      
        // if(!$this->checkParams($input)){
            return UserAddress::create($input);
        // }
        return false;
    }
    public function checkParams($input){

        return empty($input['phone']) && empty($input['mobile']) && empty($input['facebook']) && empty($input['additionalemail']);
    }
    public function sdelete(UserAddress $useraddress){
        $useraddress->delete();
    }
    public function fdelete(UserAddress $useraddress){
        $useraddress->forceDelete();
    }
    public function update(UserAddress $useraddress , $request){
         $input = $request->all();
      
            $useraddress->state = $input['state'];
            $useraddress->region = $input['region'];
            $useraddress->country = $input['country'];
            $useraddress->city = $input['city'];
            $useraddress->street = $input['street'];
            $useraddress->zippostal = $input['zippostal'];
            return $useraddress->save();
        
        return false;
    }
    public function search($fields,$param){

    }
    public function all(){
        return UserAddress::all();
    }

}