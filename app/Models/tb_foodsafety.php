<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tb_foodsafety extends Model
{
    protected $table = "tb_foodsafety";

    public function foodsafetyTypes()
    {
        return $this->belongsTo('App\Models\tb_foodsafety_types', 'fds_id_fdst', 'id');
    }
}
