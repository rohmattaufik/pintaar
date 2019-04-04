<?php

namespace App;

use App\Cart;
use App\CartCourse;
use App\Course;
use Illuminate\Support\Facades\DB;

use Illuminate\Database\Eloquent\Model;

class PembelianCourse extends Model
{

    protected $table = 'pembelian_courses';

    protected $fillable = ['no_order', 'id_user', 'cart_id', 'status_pembayaran', 'metode_pembayaran', 'bukti_pembayaran'];

    public function course()
    {
        return $this->hasOne('App\Course', 'id', 'id_course');
    }

    public function statusPembayaran()
    {
        return $this->hasOne('App\StatusPembayaran', 'id', 'status_pembayaran');
    }

    public function getUser()
    {
        return $this->hasOne('App\User', 'id', 'id_user');
    }

    public function getCart()
    {
        return $this->hasOne('App\Cart', 'id', 'cart_id');
    }

    public function getBoughtCoursesNames($cartID)
    {
        $cart_courses = (Cart::find($cartID))->getCartCourses()->get();
        $nama_course = "";
        foreach ($cart_courses as $cart_course){
            $nama_course = $nama_course.(Course::find($cart_course->course_id))->nama_course.', ';
        }

        return $nama_course;
    }

    public function getOrderPerCourse($courseId)
    {
         $orders = DB::table('pembelian_courses')
                        ->select(DB::raw('users.nama as buyer_name'), DB::raw('cart_course.course_price as course_price'), DB::raw('cart_course.discount_percentage as discount_percentage'), DB::raw('pembelian_courses.created_at as order_time'))
                        ->leftJoin('cart', 'cart.id', 'pembelian_courses.cart_id')
                        ->leftJoin('cart_course', 'cart_course.cart_id', 'pembelian_courses.cart_id')
                        ->leftJoin('users', 'users.id', 'pembelian_courses.id_user')
                        ->where('pembelian_courses.status_pembayaran', 3)
                        ->where('cart_course.course_id', $courseId)
                        ->orderBy('pembelian_courses.created_at', 'desc')
                        ->get();
        return $orders;
    }

    public function getRevenuePerCourse($courseId)
    {
        $totalRevenue = 0;
        $orders = $this->getOrderPerCourse($courseId);
        foreach ($orders as $key => $order) {
            if ($order->course_price > 0 and $order->discount_percentage > 0) {
                $finalPrice = (100-$order->discount_percentage)/100*$order->course_price;
                $totalRevenue = $totalRevenue + $finalPrice;
            }
            else {
                $totalRevenue = $totalRevenue + $order->course_price;
            }
        }
        return $totalRevenue;
    }

}
