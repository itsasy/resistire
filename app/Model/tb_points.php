<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class tb_points extends Model
{
    protected $table = 'tb_attentionpoints'; 
    
    public function info_district()
    {
        return $this->belongsTo('App\Models\tb_district', 'atp_id_dst', 'id');
    }
}
