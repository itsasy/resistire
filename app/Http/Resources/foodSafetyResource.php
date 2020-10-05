<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class foodSafetyResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'fds_title' => $this->resource->fds_title,
            'slug' => $this->resource->slug,
            'fds_desc' => $this->resource->fds_desc,
            'fds_source' => $this->resource->fds_source,
            'fds_url' => $this->resource->fds_url,
            'fds_youtube' => $this->resource->fds_youtube,
            'fds_instagram' => $this->resource->fds_instagram,
            'fds_facebook' => $this->resource->fds_facebook,
            'fds_date' => $this->resource->fds_date,
            'fds_enable' => $this->resource->fds_enable,
            'fds_id_usr' => $this->resource->fds_id_usr,
            'fds_id_fdst' => $this->resource->fds_id_fdst,
            'links' => [
                'image' => $this->resource->fds_img ? url('storage/foodSafety/' . $this->resource->fds_img) : null
            ]
        ];
    }
}
