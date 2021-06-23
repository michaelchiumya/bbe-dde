<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class artist extends Model
{
    protected $fillable = ['name', 'biography', "instagram",  "facebook", "applemusic",  "youtube",
        "soundcloud",  "spotify"];

    public function album(){
        return $this->hasMany(Album::class);
    }

    public function song(){
        return $this->hasMany(Song::class);
    }
}
