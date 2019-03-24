<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Course;
use App\User;

class ArtifactController extends Controller
{


    public function index()
    {	
		$course = new Course;
        $list_courses_code = $course->getAllCourseByCategory(1);
		$list_courses_others = $course->getAllCourseByCategory(4);

		$allUsers = User::all()->count();

		
		return view('index',  ["list_courses_code"=>$list_courses_code, "list_courses_others"=>$list_courses_others, 'allUsers'=>$allUsers]);
    }
}
