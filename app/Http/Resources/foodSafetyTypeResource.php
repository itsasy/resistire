<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class foodSafetyTypeResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'fdst_id_usr' => $this->resource->fdst_id_usr,
            'fdst_id_dst' => $this->resource->fdst_id_dst,
            'fdst_desc' => $this->resource->fdst_desc,
        ];
    }
}
