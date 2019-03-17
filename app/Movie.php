<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
	protected $fillable = [
		'name',
        'path',
        'actors',
        'gender',
        'release',
        'length',
    ];

    public function actors()
    {
        return $this->belongsToMany(Actor::class);
    }
}
	