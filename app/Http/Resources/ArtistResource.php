<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ArtistResource extends JsonResource
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
        'id' => $this->id,
        'name' => $this->name,
        'biography' => $this->biography,
          'instagram' => $this->instagram,
          'facebook' => $this->facebook,
          'applemusic' => $this->applemusic,
          'youtube' => $this->youtube,
          'soundcloud' => $this->soundcloud,
          'spotify' => $this->spotify
    ];
    }
}
