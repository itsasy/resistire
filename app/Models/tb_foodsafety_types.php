<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tb_foodsafety_types extends Model
{
    protected $table = 'tb_foodsafety_types';

    protected $guarded = [];

    protected $casts = [
        'id' => 'integer',
    ];

    public function food_safety()
    {
        return $this->hasMany(\App\Models\tb_foodsafety::class);
    }
}
