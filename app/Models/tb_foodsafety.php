<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tb_foodsafety extends Model
{
    protected $table = "tb_foodsafety";

    protected $fillable = ['fds_id_usr',
        'fds_id_fdst',
        'fds_id_dst',
        'fds_title',
        'fds_desc',
        'fds_source',
        'fds_url',
        'fds_youtube',
        'fds_instagram',
        'fds_facebook',
        'fds_img',
        'fds_date',
        'fds_id_prj'];

    public function info_foodsafetyTypes()
    {
        return $this->belongsTo('App\Models\tb_foodsafety_types', 'fds_id_fdst', 'id');
    }

    public function info_district()
    {
        return $this->belongsTo('App\Models\tb_district', 'fds_id_fdst', 'id');
    }

    public function scopeByProject($query, $project = null)
    {
        if (!$project && !auth()->check()) {
            return $query;
        }

        if (auth()->check()) {
            $project = auth()->user()->usr_id_prj;
        }

        return $query->where('fds_id_prj', $project);
    }

    public function scopeByDistrict($query, $dist = null)
    {
        if (!$dist && !auth()->check()) {
            return $query;
        }

        if (auth()->check()) {
            $dist = auth()->user()->usr_id_dst;
        }

        return $query->where('fds_id_dst', $dist);
    }

    public function scopeByType($query, $type = null)
    {
        if (!$type) {
            return $query;
        }

        return $query->where('fds_id_fdst', $type);
    }
}
