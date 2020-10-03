<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tb_alerts extends Model
{
    protected $table = 'tb_alert';

    public $timestamps = false;

    public function info_user()
    {
        return $this->belongsTo('App\Models\tb_users', 'alt_id_usr', 'id');
    }
    public function info_district()
    {
        return $this->belongsTo('App\Models\tb_district', 'alt_id_dst', 'id');
    }
}
