<?php

namespace bepc\Libraries\Generic;

use Illuminate\Http\Request;
use bepc\Http\Requests;

class Helper
{
    public static function generate_id($prefix, $suffix){
        return $prefix.date('Y-m-d').$suffix;
    }
}
