<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class tb_district  extends Model
{
    protected $table = 'tb_districts';

    protected $primaryKey = 'id';

 

    public function province()
    {
     
        return $this->hasOne(tb_province::class,'id','dst_id_prv');

    
    }
   
}
