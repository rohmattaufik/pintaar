<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class ArtifactController extends Controller
{


    public function index()
    {
	
		$list_courses_code = DB::table('courses')
            ->select( DB::raw('sum(jumlah_rating)/count(jumlah_rating) as rating') , 'nama_course','users.nama', 'courses.id', 'harga', 'courses.foto', 'deskripsi')
			 ->where('courses.kategori', 1)
			->leftJoin('tutors', 'courses.id_tutor', '=',  'tutors.id')
            ->leftJoin('users', 'users.id', '=', 'tutors.id_user')
            ->leftJoin('rating_courses', 'rating_courses.id_course', '=', 'courses.id')
            ->groupBy('courses.id', 'nama_course','users.nama', 'courses.id', 'harga', 'courses.foto', 'deskripsi')
            ->get();
		
		$list_courses_cook = DB::table('courses')
            ->select( DB::raw('sum(jumlah_rating)/count(jumlah_rating) as rating') , 'nama_course','users.nama', 'courses.id', 'harga', 'courses.foto', 'deskripsi')
			 ->where('courses.kategori', 1)
			->leftJoin('tutors', 'courses.id_tutor', '=',  'tutors.id')
            ->leftJoin('users', 'users.id', '=', 'tutors.id_user')
            ->leftJoin('rating_courses', 'rating_courses.id_course', '=', 'courses.id')
            ->groupBy('courses.id', 'nama_course','users.nama', 'courses.id', 'harga', 'courses.foto', 'deskripsi')
            ->get();
			
		
		return view('index',  ["list_courses_code"=>$list_courses_code],  ["list_courses_cook"=>$list_courses_cook]);
    }
}
