<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class artist extends Model
{
    protected $fillable = ['name', 'biography', "instagram",  "facebook", "applemusic",  "youtube",
        "soundcloud",  "spotify"];
}
