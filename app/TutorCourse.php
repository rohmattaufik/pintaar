<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TutorCourse extends Model
{
    protected $table = 'tutor_course';

    protected $fillable = ['course_id', 'tutor_id'];

	public function tutor()
	{
	   return $this->hasOne('App\Tutor', 'id', 'tutor_id');
	}
}
