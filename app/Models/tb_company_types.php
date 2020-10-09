<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tb_company_types extends Model
{
    protected $guarded = [];

    protected $casts = [
        'id' => 'integer',
    ];

    public function type()
    {
        return $this->hasMany(\App\Models\tb_company_types::class);
    }
}
