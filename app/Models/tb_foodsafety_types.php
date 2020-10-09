<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tb_foodsafety_types extends Model
{
    protected $table = "tb_foodsafety_types";

    protected $fillable = ['fdst_id_usr', 'fdst_id_dst', 'fdst_desc'];
    
    public function info_district()
        {
            return $this->belongsTo('App\Models\tb_district', 'fdst_id_dst', 'id');
        }
}
