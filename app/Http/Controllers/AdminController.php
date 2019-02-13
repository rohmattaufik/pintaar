<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Tutor;
use App\StatusPembayaran;
use App\PembelianCourse;
use App\Cart;
use App\CourseOrder;
use App\CartCourse;
use App\Course;
use App\Email;
use Carbon\Carbon;
use Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class AdminController extends MailController
{

  public function __construct()
  {
      $this->middleware('auth');
  }

  public function approve_payment()
  {

        $idUser          = Auth::user();
        $user = User::find($idUser->id);
        $id_role_admin = 3;
          if($user -> id_role == $id_role_admin){


            $list_pembelian_course = DB::table('pembelian_courses')
                            ->select(DB::raw('pembelian_courses.id as id_pembelian'),'nama', 'no_order','email','total_price','bukti_pembayaran','status',  DB::raw('pembelian_courses.created_at as waktu_order'))
                            ->leftJoin('cart', 'cart.id', '=', 'pembelian_courses.cart_id')
                            ->leftJoin('users', 'users.id', '=', 'cart.user_id')
                            ->leftJoin('status_pembayarans', 'status_pembayarans.id', '=', 'pembelian_courses.status_pembayaran')
                            ->orderBy('pembelian_courses.created_at','DESC')
                            ->get();


            return view('layouts.admin.approve-payment', ["list_pembelian_course"=>$list_pembelian_course]);


          }
          else{
            return redirect()->route('home');

          }
      }

      public function approve_payment_detail($id_pembelian)
      {

            $idUser          = Auth::user();
            $user = User::find($idUser->id);
            $id_role_admin = 3;
              if($user -> id_role == $id_role_admin){

                $pembelian_detail = DB::table('pembelian_courses')
                                ->select(DB::raw('pembelian_courses.id as id_pembelian'), 'no_order',DB::raw('cart.id as id_cart'),'nama', 'email','total_price','bukti_pembayaran','status_pembayaran','status',  DB::raw('pembelian_courses.created_at as waktu_order'))
                                ->leftJoin('cart', 'cart.id', '=', 'pembelian_courses.cart_id')
                                ->leftJoin('users', 'users.id', '=', 'cart.user_id')
                                ->leftJoin('status_pembayarans', 'status_pembayarans.id', '=', 'pembelian_courses.status_pembayaran')
                                ->where('pembelian_courses.id', $id_pembelian)
                                ->get()->first();

                $courses_yang_dibeli = DB::table('courses')
                                ->leftJoin('cart_course', 'cart_course.course_id', '=', 'courses.id')
                                ->leftJoin('tutors', 'courses.id_tutor', '=',  'tutors.id')
                                ->leftJoin('users', 'users.id', '=', 'tutors.id_user')
                                ->where('cart_course.cart_id', $pembelian_detail-> id_cart )
                                ->get();



                return view('layouts.admin.approve-payment-detail', ["pembelian_detail"=>$pembelian_detail, "courses_yang_dibeli"=>$courses_yang_dibeli ]);


              }
              else{
                return redirect()->route('home');

              }
      }

  public function approve_payment_detail_post($id_pembelian)
  {
    $idUser = Auth::user();
    $user = User::find($idUser->id);
    $id_role_admin = 3;
    
    if ($user -> id_role == $id_role_admin) {
      $mail = new Email;
      $pembelian_course = PembelianCourse::find($id_pembelian);

      $pembelian_course->status_pembayaran = Input::get('status_pembayaran');

      $pembelian_course->save();

      $user_yang_membeli = User::find($pembelian_course->id_user);
      $boughtCourses = $pembelian_course->getBoughtCoursesNames($pembelian_course->cart_id);
      $sentEmail = $mail->sendPaymentStatus($user_yang_membeli->nama, $user_yang_membeli->email, $boughtCourses, $pembelian_course->no_order, $pembelian_course->status_pembayaran);
      return redirect()->route('approve_payment_detail', ['id' => $id_pembelian]);

    }
    else {
      return redirect()->route('home');
    }
  }


//   public function get_message_for_email($pembelian_course){

//     $status_pembayaran = StatusPembayaran::find((int)$pembelian_course->status_pembayaran)->status;
//     $cart_courses = (Cart::find($pembelian_course->cart_id)) -> getCartCourses()->get();

//     $nama_course = "";
//     foreach ($cart_courses as $cart_course){
//       $nama_course = $nama_course.", ".(Course::find($cart_course->course_id))->nama_course;
//     }

//     $message = "<p>Status pembelian anda terhadap kelas yang berjudul ".$nama_course.
//                 " sudah berubah menjadi ". $status_pembayaran." dengan nomor order <b>".$pembelian_course->no_order."</b>. </p>";

//     return $message;
// }

  public function createTutor()
  {
      $idRole = Auth::user()->id_role;
      if ($idRole == 3) {
        return view('layouts/admin/add-tutor');
      }
      else {
        dd('Maaf, halaman tidak ditemukan!');
      }
  }


  public function storeNewTutor(Request $request)
  {
      $idRole = Auth::user()->id_role;
      if ($idRole == 3) {
        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
        ]);

        $password = '123456';
        $newUser = User::create([
            'nama'      => $request['name'],
            'email'     => $request['email'],
            'password'  => bcrypt($password),
            'foto'      => "",
            'id_role'   => 2,
        ]);

        $newTutor = Tutor::create([
            'id_user'      => $newUser->id,
        ]);

        return view('layouts/admin/add-tutor-success', ['newTutor' => $newUser]);
      }
      else {
        dd('Maaf, halaman tidak ditemukan!');
      }
  }

  public function approvePaymentWithSharing()
  {
    $order = DB::table('pembelian_courses')->where('status_pembayaran', 6)->update(['status_pembayaran' => 3]);
    return redirect()->back();
  }


}
