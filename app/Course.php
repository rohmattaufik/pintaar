<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Tutor;
use App\Course;
use Auth;

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

	public function tutors()
	{
		return $this->hasMany('App\TutorCourse','course_id');
	}

	public function reviews()
	{
		return $this->hasMany('App\ReviewCourse', 'id_course');
	}

	public function ratings()
	{
		return $this->hasMany('App\RatingCourse', 'id_course');
	}

	public function getRating($idCourse)
	{
		$rating = DB::table('rating_courses')
		->select( DB::raw('sum(jumlah_rating)/count(jumlah_rating) as rating') )
		->where('rating_courses.id_course', $idCourse)
		->get()->first();

		return $rating;
	}

	public function getReviews($idCourse)
	{
		$reviews = DB::table('review_courses')
					->leftJoin('users', 'users.id', '=', 'review_courses.id_user')
					->where('review_courses.id_course', $idCourse)
					->get();
		return $reviews;
	}

	public function getEnrolledStudentNumber($idCourse)
	{
		$count_student_learned = DB::table('pembelian_courses')
		->leftJoin('cart_course', 'cart_course.cart_id', '=', 'pembelian_courses.cart_id')
		->where('cart_course.course_id', $idCourse)
		->where('pembelian_courses.status_pembayaran', 3)
		->count();
		return $count_student_learned;
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

    public function getStudentPaymentStatus($idCourse)
	{
		$course = Course::where('id', $idCourse)->first();
		$status_pembayaran = DB::table('pembelian_courses')
			->select('status_pembayaran')
			->leftJoin('cart', 'cart.id', '=', 'pembelian_courses.cart_id')
			->leftJoin('cart_course', 'cart_course.cart_id', '=', 'pembelian_courses.cart_id')
			->where('cart_course.course_id', $idCourse)
			->where('status_pembayaran', '=', 3)
			->where('cart.user_id', Auth::user()->id)
			->get()->first();

		if (Auth::user()->id_role == 2) {
			$tutor = Tutor::where('id_user', Auth::user()->id)->first();

			if ($tutor->id == $course->id_tutor) {
				$status_pembayaran = new \stdClass();
				$status_pembayaran->status_pembayaran = 3;
			}
		}

		if (Auth::user()->id_role == 3) {
			$status_pembayaran = new \stdClass();
			$status_pembayaran->status_pembayaran = 3;
		}

		return $status_pembayaran;
	}

	// check if student has reviewed a course
	public function getReviewStatus($idCourse)
	{
		$status_pernah_review = DB::table('review_courses')
			->select('review')
			->where('review_courses.id_user', Auth::user()->id)
			->where('review_courses.id_course', $idCourse)
			->get()->first();
		return $status_pernah_review;
	}

}
