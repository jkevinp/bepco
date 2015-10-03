<?php 
namespace bepc\Repositories\Eloquent;
use bepc\Models\InventoryLog;
use bepc\Repositories\Contracts\InventoryLogContract;
class EloquentInventoryLogRepository implements InventoryLogContract
{
	public function find($id){
		return InventoryLog::find($id);
	}
	public function store($param){
		InventoryLog::create($param);
	}
	public function sdelete(InventoryLog $user){

	}
	public function fdelete(InventoryLog $user){

	}
	public function search($fields,$param){

	}
	public function all(){
		return InventoryLog::all();
	}
}
