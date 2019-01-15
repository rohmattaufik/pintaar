<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Course extends Model
{
    protected $table = 'courses';

	protected $fillable = ['nama_course', 'harga', 'foto', 'deskripsi', 'id_tutor', 'video', 'kategori'];
	
	public function topiks()
	{
		return $this->hasMany('App\Topik','id_course');
	}

}
