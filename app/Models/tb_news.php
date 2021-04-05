<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class tb_news extends Model
{
    protected $table = 'tb_news';

    public function info_district()
    {
        return $this->belongsTo('App\Models\tb_district', 'nws_id_dst', 'id');
    }

    public function scopeByProject($query, $project = null)
    {
        if (!$project && !auth()->check()) {
            return $query;
        }

        if (auth()->check()) {
            $project = auth()->user()->usr_id_prj;
        }

        return $query->where('nws_id_prj', $project);
    }

    public function scopeByDistrict($query, $dist = null)
    {
        if (!$dist && !auth()->check()) {
            return $query;
        }

        if (auth()->check()) {
            $dist = auth()->user()->usr_id_dst;
        }

        return $query->where('nws_id_dst', $dist);
    }

    public function scopeByType($query, $type = null)
    {
        if (!$type) {
            return $query;
        }

        return $query->where('nws_id_nwst', $type);
    }
}
