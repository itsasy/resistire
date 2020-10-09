<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class tb_province  extends Model
{
    
    protected $table = 'tb_provinces';
    protected $primaryKey = 'id';

 
    public function departments()
    {
     
        return $this->hasOne(tb_deparments::class,'id','prv_id_dpm');

    
    }
   
}
