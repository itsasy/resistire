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

    public function scopeAlertsByDist($query, $userDist = 0)
    {
        $userDist = session('autenticacion')->usr_id_dst;

        return $query->where('alt_id_dst', $userDist);
    }

    public function scopeAlertsByTypeAndProject($query, $type, $project = null)
    {
        if (session('usr_id_prj')) {
            $project = session('usr_id_prj');
        }

        return $query->where(['alt_id_altt' => $type, 'alt_id_prj' => $project]);
    }

}
