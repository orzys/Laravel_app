<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ocena extends Model
{
    protected $table = "ocena";
	
	protected $fillable = [
		'ocena', 'nazwa'
		];
	protected $hidden = [
		'timestamp', 'id'
	];
}
