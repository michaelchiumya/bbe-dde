<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Song extends Model
{
    protected $fillable = ['title', 'link', 'artist_id', 'album_id'];

    public function album(): BelongsTo
    {
        return $this->belongsTo(album::class);
    }

    public function artist(): BelongsTo
    {
        return $this->belongsTo(artist::class);
    }
}
