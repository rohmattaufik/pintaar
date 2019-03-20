<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Course extends Model
{
    protected $table = 'courses';

	protected $fillable = ['nama_course', 'harga', 'diskon', 'foto', 'deskripsi', 'id_tutor', 'video', 'kategori', 'isPublished'];
	
	public function creator()
	{
	   return $this->hasOne('App\Tutor', 'id', 'id_tutor');
	}

	public function topiks()
	{
		return $this->hasMany('App\Topik','id_course');
	}


	public function getAllCourseByCategory($categoryID)
	{
		$list_courses = DB::table('courses')
            ->select( DB::raw('sum(jumlah_rating)/count(jumlah_rating) as rating') , 'nama_course','users.nama', 'courses.id', 'harga', 'diskon', 'courses.foto', 'deskripsi')
			->leftJoin('tutors', 'courses.id_tutor', '=',  'tutors.id')
            ->leftJoin('users', 'users.id', '=', 'tutors.id_user')
            ->leftJoin('rating_courses', 'rating_courses.id_course', '=', 'courses.id')
            ->where('courses.kategori', $categoryID)
            ->where('courses.isPublished', 1)
            ->groupBy('courses.id', 'nama_course','users.nama', 'courses.id', 'harga', 'diskon', 'courses.foto', 'deskripsi')
            ->get();
        return $list_courses;
    }

	public function tutors()
	{
		return $this->hasMany('App\TutorCourse','course_id');
	}

}
