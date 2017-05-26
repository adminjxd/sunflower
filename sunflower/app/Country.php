<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;  

class Country extends Model
{
    protected $table = 'test';  
    public $timestamps = false;  
    public function readCountry()//查  
    {  
        return $this->all()->toArray();  
    }  
    public function oneCountry($data,$arr)//单条查询  
    {  
        return $this->where($data,$arr)->get()->toArray();  
    }  
    public function delCountry($data)//删  
    {  
        $country = $this->where($data);  
        return $country->delete();  
    }  
    public function updCountry($data,$list,$arr)//改  
    {  
        $country = $this->where($data,$list);  
        return $country->update($arr);  
    }  
    public function addCountry($data)//增  
    {  
        return DB::table('country')->insert($data);  
    }
}
