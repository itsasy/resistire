<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class foodSafetyCollection extends ResourceCollection
{
    public $collects = foodSafetyResource::class;

    public function toArray($request)
    {
        return [
            'data' => $this->collection
        ];
    }
}
