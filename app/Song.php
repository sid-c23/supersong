<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
	public $fillable = ['title', 'artist', 'imageUrl'];

}
