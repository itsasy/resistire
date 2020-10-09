<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class tb_news extends Model
{
    protected $table = 'tb_news';
    
    public function info_district()
        {
            return $this->belongsTo('App\Models\tb_district', 'nws_id_dst', 'id');
        }
}