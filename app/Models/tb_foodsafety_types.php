<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tb_foodsafety_types extends Model
{
    protected $table = "tb_foodsafety_types";

    protected $fillable = ['fdst_id_usr', 'fdst_id_dst', 'fdst_desc', 'fdst_id_prj'];

    public function info_district()
    {
        return $this->belongsTo('App\Models\tb_district', 'fdst_id_dst', 'id');
    }

    public function scopeByProject($query, $project = null)
    {
        if (!$project && !auth()->check()) {
            return $query;
        }

        if (auth()->check()) {
            $project = auth()->user()->usr_id_prj;
        }

        return $query->where('fdst_id_prj', $project);
    }

    public function scopeByDistrict($query, $dist = null)
    {
        if (!$dist && !auth()->check()) {
            return $query;
        }

        if (auth()->check()) {
            $dist = auth()->user()->usr_id_dst;
        }

        return $query->where('fdst_id_dst', $dist);

    }
}
