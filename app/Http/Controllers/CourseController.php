<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;
use Illuminate\Support\Facades\DB;
use App\KomentarCourse;
use App\Topik;
use App\Tutor;
use App\TutorCourse;
use App\PertanyaanTopik;
use App\ReviewCourse;
use App\RatingCourse;
use App\LogUserTontonTopik;
use Illuminate\Support\Facades\Input;
use Auth;
use Carbon\Carbon;

class CourseController extends CourseOrderController
{

	public function __construct()
  {
       $this->middleware('cookieTrackingChannelAcqusition');
  }

	public function index()
	{

		$list_courses_with_users = DB::table('courses')
		->select( DB::raw('sum(jumlah_rating)/count(jumlah_rating) as rating') , 'nama_course','users.nama', 'courses.id', 'harga', 'courses.foto', 'deskripsi')
		->leftJoin('tutors', 'courses.id_tutor', '=',  'tutors.id')
		->leftJoin('users', 'users.id', '=', 'tutors.id_user')
		->leftJoin('rating_courses', 'rating_courses.id_course', '=', 'courses.id')
		->groupBy('courses.id', 'nama_course','users.nama', 'courses.id', 'harga', 'courses.foto', 'deskripsi')
		->get();




		return view('layouts.course.index', ["list_courses_with_users"=>$list_courses_with_users]);
	}

	public function detail($id)
	{
		$course = Course::whereId($id)->first();
		$rating = $course->getRating($course->id);
		$list_review = $course->getReviews($course->id);
		$count_student_learned = $course->getEnrolledStudentNumber($course->id);

		if (Auth::user()) {
			$status_pembayaran = $course->getStudentPaymentStatus($course->id);
			$status_pernah_review = $course->getReviewStatus($course->id);
		}
		else
		{
			$status_pembayaran = null;
			$status_pernah_review = null;
		}

		$list_topik = self::mapping_topik_by_parent($id);

		return view('layouts.course.detail',  [ "count_student_learned" => $count_student_learned,"status_pernah_review" =>$status_pernah_review, "status_pembayaran"=> $status_pembayaran,"rating" => $rating, "list_topik"=>$list_topik , "course"=>$course, "list_review" => $list_review ]);
	}

	public function detailVar2($id)
	{
		$course = Course::whereId($id)->first();
		$rating = $course->getRating($course->id);
		$list_review = $course->getReviews($course->id);
		$count_student_learned = $course->getEnrolledStudentNumber($course->id);

		if (Auth::user()) {
			$status_pembayaran = $course->getStudentPaymentStatus($course->id);
			$status_pernah_review = $course->getReviewStatus($course->id);
		}
		else
		{
			$status_pembayaran = null;
			$status_pernah_review = null;
		}

		$list_topik = self::mapping_topik_by_parent($id);

		return view('layouts.course.detail-var-2',  [ "count_student_learned" => $count_student_learned,"status_pernah_review" =>$status_pernah_review, "status_pembayaran"=> $status_pembayaran,"rating" => $rating, "list_topik"=>$list_topik , "course"=>$course, "list_review" => $list_review ]);
	}

	public function mapping_topik_by_parent($id_course){

		$list_topik = Topik::where('id_course', $id_course)->get();
		$list_topik_parents = array();
		$list_topik_childs  = array();
		$list_topik_by_id_parent = array();
		foreach ($list_topik as $idx => $topik)
		{
			if ($topik['parent_id'] == null)
				$list_topik_parents[] = $topik;
			else
				$list_topik_childs[]  = $topik;
		}
		foreach ($list_topik_childs as $idx => $list_topik_child)
			$list_topik_by_id_parent[$list_topik_child['parent_id']][] = $list_topik_child;
		foreach ($list_topik_parents as $idx => $list_topik_parent)
			$list_topik_parents[$idx]['childs'] = !empty($list_topik_by_id_parent[$list_topik_parent['id']]) ? $list_topik_by_id_parent[$list_topik_parent['id']] : array();
		$list_topik = $list_topik_parents;

		return $list_topik;
	}

	public function course_review_post(Request $request)
	{
		if (Auth::user()) {
			$review = new ReviewCourse;
			$review->storeReview($request['idCourse'], $request['body_review']);

			$jumlah_rating;
			if ($request['rating'] == null) {
				$jumlah_rating = 5;
			}
			else {
				$jumlah_rating = $request['rating'];
			}

			$rating = new RatingCourse;
			$rating->storeRating($request['idCourse'], $jumlah_rating);

			return redirect()->back()->with('submit-review', true);
		}

		else {
			return redirect()->route('login');

		}
	}

	/**
	 * TUTOR PAGE
	 * Authentication Role Tutor
	 */

	public function get_course()
	{
		# get course by tutor login
		$tutor      = Tutor::where('id_user', Auth::user()->id)->first();
		$courses    = Course::where('id_tutor', $tutor->id)->get();
		return view('layouts/tutor/course/index')->with('courses', $courses);
	}

	public function create()
	{
		$course = new Course;
		return view('layouts.course.tutor.create-course')->with('course', $course);
	}

	public function category($id_category)
	{

		$course = new Course;

		$list_courses_with_users = $course->getAllCourseByCategory($id_category);

		$kategori_kelas_str = "";

		switch ($id_category) {
			case 1:
			$kategori_kelas_str = "Pemrograman";
			break;
			case 2:
			$kategori_kelas_str = "Bahasa";
			break;
			case 3:
			$kategori_kelas_str = "Bisnis";
			break;
			case 4:
			$kategori_kelas_str = "Lainnya";
			break;
		}







		return view('layouts.course.index', ["kategori_kelas_str"=>$kategori_kelas_str, "list_courses_with_users" => $list_courses_with_users]);
	}

	public function subscribe_course($id_topik)
	{
		$user = Auth::User();
		$topik= Topik::where('id', $id_topik)->first();
		$course = Course::where('id', $topik->id_course)->first();
		$status_pernah_review = $course->getReviewStatus($course->id);
		$data['user'] = $user;
		$data['course'] = $course;
		$data['status_pernah_review'] = $status_pernah_review;

		return view('layouts/course/subscribe', ["data"=>$data]);
	}

	public function update($id)
	{
		$course = Course::whereId($id)->first();
		$tutors = Tutor::with('users')->get(); // ini apa?

		$tutor = Tutor::whereIdUser(Auth::user()->id)->first();

		if ($tutor != null and $course->id_tutor == $tutor->id)
		{
			return view('layouts.course.tutor.create-course')->with('course', $course)->with('tutors', $tutors);
		}
		else {
			return "You don't have permission to access this page";
		}


	}

	public function submit(Request $request)
	{

		$tutor = Tutor::whereIdUser(Auth::user()->id)->first();
		if($tutor == null)
		{
			return "You not have permission to access this page";
		}
		$fotoCourse     = $request->file('foto');
		$urlFoto       = "";
		if($fotoCourse != null){
			$destinationPath    = 'images/gambar_course';
			$fotoName           = $fotoCourse->getClientOriginalName();
			$move               = $fotoCourse->move($destinationPath, $fotoName);
			$urlFoto            = "{$fotoName}";
		}

		$video     = $request->file('video');
		$url       = "";
		if($video != null){
			$destinationPath    = 'video/video_course';
			$name               = $video->getClientOriginalName();
			$move              = $video->move($destinationPath, $name);
			$url                = "{$name}";
		}
		$request['foto'] = $urlFoto;
		$request['video'] = $url;
		$course;
		if($request->id == null)
		{
			$request['id_tutor'] = $tutor->id;
			$request['foto']     = $urlFoto;
			$request['video']    = $url;
			$course =Course::create([
				"nama_course"   => $request->nama_course,
				"harga"         => $request->harga,
				"diskon"        => $request->diskon,
				"id_tutor"      => $tutor->id,
				'foto'          => $urlFoto,
				'video'         => $url,
				'deskripsi'     => $request->deskripsi,
				'kategori'      => 1
			]);
		} else {
			if($urlFoto != "" and $url != "")
			{
				$course = Course::whereId($request->id)->update([
					"nama_course"   => $request->nama_course,
					"harga"         => $request->harga,
					"diskon"        => $request->diskon,
					"id_tutor"      => $tutor->id,
					'foto'          => $urlFoto,
					'video'         => $url,
					'deskripsi'     => $request->deskripsi,
					'kategori'         => 1
				]);
			} else {
				if($urlFoto != "")
				{
					$course = Course::whereId($request->id)->update([
						"nama_course"   => $request->nama_course,
						"harga"         => $request->harga,
						"diskon"        => $request->diskon,
						"id_tutor"      => $tutor->id,
						'foto'          => $urlFoto,
						'deskripsi'     => $request->deskripsi,
						'kategori'         => 1
					]);
				} else if($url != "")
				{
					$course = Course::whereId($request->id)->update([
						"nama_course"   => $request->nama_course,
						"harga"         => $request->harga,
						"diskon"        => $request->diskon,
						"id_tutor"      => $tutor->id,
						'video'         => $url,
						'deskripsi'     => $request->deskripsi,
						'kategori'         => 1
					]);
				} else {
					$course =Course::whereId($request->id)->update([
						"nama_course"   => $request->nama_course,
						"harga"         => $request->harga,
						"diskon"        => $request->diskon,
						"id_tutor"      => $tutor->id,
						'deskripsi'     => $request->deskripsi,
						'kategori'         => 1
					]);
				}
			}

		}
		return redirect()->route('course-detail', $request->id != null ? $request->id : $course->id);
	}

	public function delete($id)
	{
		Course::whereId($id)->delete();
		return redirect()->back();
	}

	public function publishCourse($id)
	{
		$course = Course::whereId($id)->first();
		$course->isPublished = 1;
		$course->update();
		return redirect()->back();
	}

	public function get_course_detail($id)
	{
		$course = Course::whereId($id)->first();
		return view('layouts.course.tutor.course-detail')->with('course', $course);
	}

	public function check_and_set_valid_date_course_oder($status_pembayaran){

	  #dd($status_pembayaran);
	  // if( $status_pembayaran != null  && $status_pembayaran -> status_pembayaran  == 3){
	  //   $waktu_valid_pembelian_carbon = Carbon::createFromFormat('Y-m-d', $status_pembayaran-> waktu_valid_pembelian);
	  //   $status_pembayaran -> waktu_valid_pembelian =   $waktu_valid_pembelian_carbon->format('d-m-Y');
	  //   $status_pembayaran -> waktu_disetujui = $waktu_valid_pembelian_carbon ->subMonths(1)->format('d-m-Y');
	  // }
	  // return $status_pembayaran;

	}

	public function check_and_process_topik_if_user_has_been_watch($list_topik, $user_id){
		$list_topik->each(function ($topik) use ($user_id){
			$id_log_user = LogUserTontonTopik::where('id_topik', $topik->id)
			->where('id_user',$user_id )
			->first();

			if($id_log_user != null ){
				$topik-> is_already_watch = true;

			}
		});

		return $list_topik;
	}


	public function addTutor($courseID)
	{
		$tutor = null;
		$course = Course::where('id', $courseID)->get()->first();
		return view('layouts/course/tutor/tutor-course')->with(['tutor' => $tutor, 'course' => $course]);
	}

	public function editTutor($courseID, $tutorID)
	{
		$course = Course::where('id', $courseID)->first();
		$courseCreator = Tutor::where('id', $course->id_tutor)->first();

		if (Auth::User() and Auth::User()->id_role == 2 and Auth::User()->id == $courseCreator->id_user) {
			$tutor = Tutor::whereId($tutorID)->first();

			return view('layouts/course/tutor/tutor-course')->with(['tutor' => $tutor, 'course' => $course]);
		}
		else {
			return redirect()->route('home');
		}

	}

	public function deleteTutor($courseID, $tutorID)
	{
		Tutor::whereId($tutorID)->delete();
		TutorCourse::where('tutor_id', $tutorID)->delete();
		return redirect()->back();
	}

	public function storeTutor(Request $request)
	{
		$course = Course::where('id', $request->course_id)->first();
		$courseCreator = Tutor::where('id', $course->id_tutor)->first();

		if (Auth::User() and Auth::User()->id_role == 2 and Auth::User()->id == $courseCreator->id_user) {
			$tutorCourse = new TutorCourse;
			$tutorCourse->store($request);
			return redirect()->route('course-detail', $course->id);
		}
		else {
			return redirect()->route('home');
		}

	}
}
