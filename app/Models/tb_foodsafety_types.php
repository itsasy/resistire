<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tb_foodsafety_types extends Model
{
    protected $table = "tb_foodsafety_types";

    protected $fillable = ['fdst_id_usr', 'fdst_id_dst', 'fdst_desc'];
}
