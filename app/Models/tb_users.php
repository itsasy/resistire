<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Tymon\JWTAuth\Contracts\JWTSubject;

use Illuminate\Foundation\Auth\User as Authenticatable;

class tb_users extends Authenticatable implements JWTSubject
{
    protected $table = 'tb_users';


    protected $hidden = ['password'];

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }

    public function district()
    {
        return $this->hasOne(tb_district::class, 'id', 'usr_id_dst');
    }

    public function scopeUsersByDistrict($query, $district = null)
    {
        if (!$district && !auth()->check()) {
            return $query;
        }

        if (auth()->check()) {
            $district = auth()->user()->usr_id_dst;
        }

        return $query->where('usr_id_dst', $district);
    }

    public function scopeUsersByTypeProject($query, $project = null)
    {
        if (!$project && !auth()->check()) {
            return $query;
        }

        if (auth()->check()) {
            $project = auth()->user()->usr_id_prj;
        }

        return $query->Where('usr_id_prj', $project);
    }
}
