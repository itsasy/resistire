<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class tb_companies extends Model
{
    protected $table = 'tb_companies';
    
    public function info_district()
    {
        return $this->belongsTo('App\Models\tb_district','cmp_id_dst','id');
    }
    
    public function info_company_type()
    {
        return $this->belongsTo('App\Models\tb_company_types','cmp_id_cmpt','id');
    }
}