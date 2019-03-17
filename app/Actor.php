<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Actor extends Model
{
	protected $fillable = [
		'name',
        'born_date',
        'nationality'
	];

    public function movies()
    {
        return $this->belongsToMany(Movie::class);
    }
}
