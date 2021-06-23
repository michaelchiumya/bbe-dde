<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SongResource extends JsonResource
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
          'title' => $this->title,
          'link' => $this->link,
          'producer' => $this->producer,
          'writer' => $this->writer,
          'feature' => $this->feature,
          'download' => $this->download,
          'stream' => $this->stream,
          'album_id' => $this->album_id,
          'song_id' => $this->song_id
    ];
    }
}
