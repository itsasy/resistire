<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class foodSafetyTypeCollection extends ResourceCollection
{
    public $collects = foodSafetyTypeResource::class;

    public function toArray($request)
    {
        return [
            'data' => $this->collection
        ];
    }
}
