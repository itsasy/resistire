<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tb_foodsafety extends Model
{
    protected $table = 'tb_foodsafety';

    protected $guarded = [];

    protected $casts = [
        'id' => 'integer',
        'fds_enable' => 'boolean',
        'fds_id_usr' => 'integer',
        'fds_id_fdst' => 'integer',
    ];

    /* protected $dates = [
        'fds_date',
    ]; */


    public function tb_user()
    {
        return $this->belongsTo(\App\Models\tb_users::class);
    }

    public function foodsafety_type()
    {
        return $this->belongsTo(\App\Model\tb_foodsafety_types::class);
    }
}
