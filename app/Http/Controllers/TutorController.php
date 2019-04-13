<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Tutor;
use App\PembelianCourse;
use App\User;
use App\Course;
use Illuminate\Support\Facades\DB;


class TutorController extends Controller
{
    public function showCourseSales($courseId)
    {
        $tutor = Tutor::where('id_user', Auth::user()->id)->first();
        $course = Course::whereId($courseId)->first();   
        $pembelian_courses = new PembelianCourse;

        if ($course->id_tutor == $tutor->id) {
            $orders = $pembelian_courses->getOrderPerCourse($courseId);
            $totalRevenue = $pembelian_courses->getRevenuePerCourse($courseId);
            //dd($orders);
            return view('layouts/course/tutor/sales-course', ["orders"=>$orders, "course"=>$course, "totalRevenue"=>$totalRevenue]);
        }
        else {
            return route('home');
        }
    }


    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show()
    {
        $user = Auth::user();
        $tutor = Tutor::where('id_user', $user->id)->first();
        
        return view('layouts/tutor/profile/show-profile', ['tutor' => $tutor, 'user' => $user]);
    }

    public function edit()
    {
        $user = Auth::user();
        $tutor = Tutor::where('id_user', $user->id)->first();
        
        return view('layouts/tutor/profile/edit', ['tutor' => $tutor, 'user' => $user]);
    }

    public function history_pembelian_course() {
        if(Auth::user()->id_role == 2){
            $tutor = Tutor::where('id_user', Auth::user()->id)->first();

            $list_pembelian_course = DB::table('pembelian_courses')
                                    ->select(DB::raw('pembelian_courses.no_order as no_order'), 'nama', 'email', 'total_price', DB::raw('pembelian_courses.created_at as waktu_order'))
                                    ->leftJoin('cart', 'cart.id', '=', 'pembelian_courses.cart_id')
                                    ->leftJoin('cart_course', 'cart_course.cart_id', '=', 'pembelian_courses.cart_id')
                                    ->leftJoin('users', 'users.id', '=', 'cart.user_id')
                                    ->leftJoin('status_pembayarans', 'status_pembayarans.id', '=', 'pembelian_courses.status_pembayaran')
                                    ->leftJoin('courses', 'courses.id', '=', 'cart_course.course_id')
                                    ->where('pembelian_courses.status_pembayaran', 3)
                                    ->where('courses.id_tutor', $tutor->id)
                                    ->orderBy('pembelian_courses.created_at','DESC')
                                    ->get();

            $list_revenue_permonth = DB::table('pembelian_courses')
                                  ->select(DB::raw("extract(month from pembelian_courses.updated_at) as month"), DB::raw("extract(year from pembelian_courses.updated_at) as year"), DB::raw("(SUM(total_price)) as total_price"), DB::raw("(count(*)) as jumlah_pembelian"))
                                  ->leftJoin('cart', 'cart.id', '=', 'pembelian_courses.cart_id')
                                  ->leftJoin('cart_course', 'cart_course.cart_id', '=', 'pembelian_courses.cart_id')
                                  ->leftJoin('users', 'users.id', '=', 'cart.user_id')
                                  ->leftJoin('status_pembayarans', 'status_pembayarans.id', '=', 'pembelian_courses.status_pembayaran')
                                  ->leftJoin('courses', 'courses.id', '=', 'cart_course.course_id')
                                  ->where('pembelian_courses.status_pembayaran', 3)
                                  ->groupby(DB::raw("extract(month from pembelian_courses.updated_at)"), DB::raw("extract(year from pembelian_courses.updated_at)"))
                                  ->orderBy(DB::raw("extract(month from pembelian_courses.updated_at)"), DB::raw("extract(year from pembelian_courses.updated_at)"),'DESC')
                                  ->where('courses.id_tutor', $tutor->id)
                                  ->get();


            return view('layouts.tutor.list-pembelian-courses', ["list_pembelian_course"=>$list_pembelian_course, "list_revenue_permonth" => $list_revenue_permonth]);
        }
        else {
          return redirect()->route('home');
        }
    }

    public function update(Request $request)
    {
        $tutor = new Tutor;
        $tutor->edit($request);
        return redirect()->route('show-tutor');
    }

    public function destroy($id)
    {
        //
    }
}
