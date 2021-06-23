<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    protected $fillable = ['title', 'link', 'artist_id', 'album_id'];

    public function album(){
        return $this->belongsTo(album::class);
    }

    public function artist(){
        return $this->belongsTo(artist::class);
    }
}
