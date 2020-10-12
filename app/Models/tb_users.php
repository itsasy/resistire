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
}
