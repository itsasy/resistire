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

    public function scopeAlertsByDist($query, $userDist = null)
    {
        if (!$userDist && !auth()->check()) {
            return $query;
        }

        if (auth()->check()) {
            $userDist = auth()->user()->usr_id_dst;
        }

        return $query->where('alt_id_dst', $userDist);
    }

    public function scopeAlertsByType($query, $type)
    {
        if (!$type) {
            return $query;
        }

        return $query->where('alt_id_altt', $type);
    }

    public function scopeAlertsByProject($query, $project = null)
    {
        if (!$project && !auth()->check()) {
            return $query;
        }

        if (auth()->check()) {
            $project = auth()->user()->usr_id_prj;
        }

        return $query->where('alt_id_prj', $project);
    }

    public function scopeAlertsByUser($query, $user = null)
    {
        if (!$user && !auth()->check()) {
            return $query;
        }

        if (auth()->check()) {
            $user = auth()->user()->id;
        }

        return $query->where('alt_id_usr', $user);
    }
}
