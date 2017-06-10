<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Request;

class Oauth_user extends Model
{
    protected $table = 'oauth_user';  

    //获取IP
    public static function getIp()
    {
    	return Request::getClientIp();
    }
}
