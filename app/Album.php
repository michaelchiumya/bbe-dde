<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Album extends Model
{
    protected $fillable = ["title", "label", "link", "artist_id", "release_date"];

    public function artist(): BelongsTo
    {
        return $this->belongsTo(artist::class);
    }

    public function album(): HasMany
    {
        return $this->hasMany(Album::class);
    }
}
