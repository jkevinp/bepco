<?php namespace bepc\Repositories\Eloquent;

use bepc\Repositories\Contracts\UserBarcodeContract;
use bepc\Models\User;
use bepc\Models\UserBarcode;
use bepc\Libraries\BarcodeGenerator\BarcodeGenerator13 as BgcOutput;
class EloquentUserBarcodeRepository implements UserBarcodeContract
{
	public function __construct(BgcOutput $b){
		$this->BgcOutput = $b;
	}

	public function find($id){
		return UserBarcode::find($id);
	}
	public function store(User $user, $file){
		 $param['path'] = public_path('img-id')."/";
		 $param['status'] = 'created';
		 $param['filename'] = $file;
         $param['user_id'] = $user->id;
         $param['barcodekey'] = $user->id;
		 return UserBarcode::create($param);
	}
	public function sdelete(UserBarcode $userbarcode){
		$userbarcode->delete();
	}
	public function fdelete(UserBarcode $userbarcode){
		$userbarcode->forceDelete();
	}
	public function create_barcode($userid, $extension , $path){
		return $this->BgcOutput->output($userid , $extension , $path);
	}
	public function search($fields, $param){

	}
	public function all(){
		return UserBarcode::all();
	}
	public function checkbarcodefile($fullpath){
        return file_exists($fullpath);
    }
} 