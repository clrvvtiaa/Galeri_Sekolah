<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Map extends Model
{
    protected $fillable = [
        'embed_url',
        'google_maps_link',
        'title'
    ];
}
