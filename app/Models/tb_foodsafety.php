<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tb_foodsafety extends Model
{
    protected $table = "tb_foodsafety";

    protected $fillable = ['fds_id_usr', 'fds_id_fdst', 'fds_id_dst','fds_title', 'fds_desc', 'fds_source', 'fds_url', 'fds_youtube', 'fds_instagram', 'fds_facebook', 'fds_img', 'fds_date'];

    public function foodsafetyTypes()
    {
        return $this->belongsTo('App\Models\tb_foodsafety_types', 'fds_id_fdst', 'id');
    }
}
