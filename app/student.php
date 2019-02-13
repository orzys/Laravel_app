<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
//use Illuminate\Notifications\Notifiable;


class Student extends Model
{
    protected $table = "student";
	
	protected $fillable = [
		'imie', 'nazwisko', 'data_urodzenia', 'wiek', 'klasa', 'plec', 'srednia_ocen', 'pesel'
		];
	protected $hidden = [
		'timestamp', 'id'
	];

	public function ocena(){
		return $this->hasMany('App\ocena');
	}
}
