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

    public function user()
    {
        return $this->hasOne(\App\Models\tb_users::class);
    }

    public function type()
    {
        return $this->hasOne(\App\Models\tb_foodsafety_types::class);
    }

    public function district()
    {
        return $this->hasOne(\App\Models\tb_district::class);
    }
}
