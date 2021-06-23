<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AlbumResource extends JsonResource
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
        "id" => $this->id,
        "title" => $this->title,
        "label" => $this->label,
        "release_date" => $this->release_date,
        'artist_id '=> $this->artist_id
        ];
    }
}
