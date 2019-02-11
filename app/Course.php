<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Course extends Model
{
    protected $table = 'courses';

	protected $fillable = ['nama_course', 'harga', 'foto', 'deskripsi', 'id_tutor', 'video', 'kategori'];
	
	public function creator()
	{
	   return $this->hasOne('App\Tutor', 'id', 'id_tutor');
	}

	public function topiks()
	{
		return $this->hasMany('App\Topik','id_course');
	}

	public function tutors()
	{
		return $this->hasMany('App\TutorCourse','course_id');
	}

}
