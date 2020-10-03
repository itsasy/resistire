<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tb_foodsafety_types extends Model
{
    protected $table = "tb_foodsafety_types";

    protected $fillable = ["fdst_desc"];
}
