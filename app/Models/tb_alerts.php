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

    public function scopeBySerenazgo($query)
    {
        return $query->selectRaw("count(case when alt_id_altt = 1 then 1 end) as Serenazgo");
    }

    public function scopeByAmbulancia($query)
    {
        return $query->selectRaw("count(case when alt_id_altt = 2 then 1 end) as Ambulancia");
    }

    public function scopeByBomberos($query)
    {
        return $query->selectRaw('count(case when alt_id_altt = 3 then 1 end) as Bomberos');
    }

    public function scopeByFiscalizacion($query)
    {
        return $query->selectRaw('count(case when alt_id_altt = 4 then 1 end) as Fiscalizacion');
    }

    public function scopeByMujer($query)
    {
        return $query->selectRaw('count(case when alt_id_altt = 5 then 1 end) as Mujer');
    }

    public function scopeBySolidos($query)
    {
        return $query->selectRaw('count(case when alt_id_altt = 6 then 1 end) as Solidos');
    }

    public function scopeByReciclaje($query)
    {
        return $query->selectRaw('count(case when alt_id_altt = 7 then 1 end) as Reciclaje');
    }

    public function scopeByMental($query)
    {
        return $query->selectRaw('count(case when alt_id_altt = 8 then 1 end) as Mental');
    }

    public function scopeByCovid($query)
    {
        return $query->selectRaw('count(case when alt_id_altt = 9 then 1 end) as Covid');
    }

    public function scopeByConstruccion($query)
    {
        return $query->selectRaw('count(case when alt_id_altt = 10 then 1 end) as Construccion');
    }

    public function scopeByTransito($query)
    {
        return $query->selectRaw('count(case when alt_id_altt = 11 then 1 end) as Transito');
    }

    public function scopeByAmbulante($query)
    {
        return $query->selectRaw('count(case when alt_id_altt = 12 then 1 end) as Ambulante');
    }

    public function scopeDateFormatAndTotal($query)
    {
        return $query->selectRaw("date_format(`alt_date`, '%m') as mes")
            ->selectRaw("date_format(`alt_date`, '%Y') as año")
            ->selectRaw("count(*) as total");
    }
}
