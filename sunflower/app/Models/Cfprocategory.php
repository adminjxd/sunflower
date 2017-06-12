<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Cfprocategory extends Model
{
    protected $table = 'cf_procategory';

    /**
     *获取众筹分类数据 
     */  
    public function getAll()
    {
    	$cat = DB::table($this->table)->get();
    	return $cat;
    }

}