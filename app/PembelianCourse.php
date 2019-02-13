<?php

namespace App;

use App\Cart;
use App\Course;

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

}
