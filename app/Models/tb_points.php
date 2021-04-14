<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class tb_points extends Model
{
    protected $table = 'tb_attentionpoints';

    public function info_district()
    {
        return $this->belongsTo('App\Models\tb_district', 'atp_id_dst', 'id');
    }

    public function scopeInstitutionsByDistrict($query, $dist = null){

        if (!$dist && !auth()->check()) {
            return $query;
        }
 
        if (auth()->check()) {
            $dist = auth()->user()->usr_id_dst;
        }

        return $query->where('atp_id_dst', $dist);
    }

    public function scopeInstitutionsByProject($query, $project = null){
        if (!$project && !auth()->check()) {
            return $query;
        }

        if (auth()->check()) {
            $project = auth()->user()->usr_id_prj;
        }

        return $query->where('atp_id_prj', $project);
    }
}
