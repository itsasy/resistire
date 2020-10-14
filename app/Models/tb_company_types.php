<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class tb_company_types extends Model
{
    protected $table = 'tb_company_types';

    protected $fillable = ['cmpt_desc'];
}
