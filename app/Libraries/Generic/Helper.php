<?php

namespace bepc\Libraries\Generic;

use Illuminate\Http\Request;
use bepc\Http\Requests;
use bepc\Models\User;
use bepc\Models\InventoryLog;
class Helper
{
	
    public static function generate_id($prefix, $suffix){
        return $prefix.date('Y-m-d').$suffix;
    }
    public static function generate_user_id(){
        return date('Ymds').str_pad(rand(0,99),2,"0");
    }
    public static function log($processname , $action, User $user , $fired_at , $field , $param){
    	$log['proccess'] = $processname;
    	$log['action'] = $action;
    	$log['user_name'] = $user->getName();
    	$log['user_id'] = $user->id;
    	$log['field'] = $field;
    	$log['fired_at'] = $fired_at;
    	$log['param'] = $param;
    	$log['message'] = $fired_at.":".$user->getName(). " proccesed ".$processname." doing ".$action." changing ".$field. " value to ".$param;
    	InventoryLog::create($log);
    }
}
