<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tb_companies extends Model
{

    protected $table = 'tb_companies';
    protected $guarded = [];

    protected $casts = [
        'id' => 'integer',
        'fds_state' => 'boolean',
        'cmp_id_usr' => 'integer',
        'cmp_id_dst' => 'integer',
        'cmp_id_cmpt' => 'integer',
    ];


    /* public function tbDistrict()
    {
        return $this->hasOne(\App\Models\TbDistrict::class);
    } */

    public function type()
    {
        return $this->hasOne(\App\Models\tb_company_types::class);
    }
/*
    public function cmp()
    {
        return $this->belongsTo(\App\Models\TbUsers::class);
    }

    public function cmp()
    {
        return $this->belongsTo(\App\Models\Cmp::class);
    } */

   /*  public function cmp()
    {
        return $this->belongsTo(\App\Models\Cmp::class);
    } */
}
