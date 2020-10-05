<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class tb_foodsafety_types extends Model
{
    protected $table = 'tb_foodsafety_types';

    protected $guarded = [];

    protected $casts = [
        'id' => 'integer',
    ];

    public function tbFoodsafeties()
    {
        return $this->hasMany(\App\Model\tb_foodsafety::class);
    }
}
