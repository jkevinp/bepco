<?php namespace bepc\Repositories\Eloquent;

use bepc\Repositories\Contracts\CustomerContract;
use bepc\Models\Customer;
use bepc\Models\UserBarcode;

use bepc\Models\UserIdCard;
use bepc\Libraries\BarcodeGenerator\BarcodeGenerator as BgcOutput;
use bcrypt;
use bepc\Libraries\Generic\Helper;
use bepc\Models\UserPhoto;

use Validator;
class EloquentCustomerRepository implements CustomerContract
{

	public function find($id){
		return Customer::find($id);
	}
	public function store($param){
		$param['id'] = $this->generate_id();
		$user =Customer::create($param);
		return $user;
	}
	public function generate_id(){
		return Helper::generate_user_id();
	}
	public function sdelete(Customer $user){
		return $user->delete();
	}
	public function fdelete(Customer $user){
		return $user->forceDelete();
	}

	public function search($searchParameter){
		return Customer::where($searchParameter);
	}
	public function all(){
		return Customer::all();
	}
	public function generate_barcode(Customer $user){

	}
	public function uploadphoto($request){
		$input = $request->all();
		$image = $request->file('file');
        if(strpos($image->getClientMimeType(),'image') !== FALSE){
            $upload_folder ='img-photo/';
            $input['id'] = str_random();
            $image->move(public_path($upload_folder).'/', $input['id'].'.' . $image->getClientOriginalExtension());
            $input['path'] =public_path($upload_folder).'/';
            $input['filename'] = $input['id'].'.' . $image->getClientOriginalExtension();
            $p =  UserPhoto::create($input);
            return $p;
        }
        return false;
	}
	public function updatephoto($request){
		$input = $request->all();
		
		$image = $request->file('file');
        if(strpos($image->getClientMimeType(),'image') !== FALSE){
            $upload_folder ='img-photo/';
            $input['id'] = str_random();
            $image->move(public_path($upload_folder).'/', $input['id'].'.' . $image->getClientOriginalExtension());
            $input['path'] =public_path($upload_folder).'/';
            $input['filename'] = $input['id'].'.' . $image->getClientOriginalExtension();
            $p = $this->find($input['user_id'])->userphoto;
            $p->path = $input['path'];
            $p->filename = $input['filename'];
            return $p->save();
        }
        return false;
	}

	public function getphoto(Customer $user){

	}
	public function changeStatus(Customer $user){
		$user->activated = !$user->activated;
		return $user->save();
	}
	public function updatePassword(Customer $user ,$newPassword){
		$user->password = bcrypt($newPassword);
		return $user->save();
	}
	public function validateStore($param){
		$rules = Customer::getRuleStore();
		return Validator::make($param , $rules);
	}
} 