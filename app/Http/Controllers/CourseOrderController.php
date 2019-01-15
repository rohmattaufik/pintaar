<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Course;
use App\Cart;
use App\User;
use App\PembelianCourse;
use App\CartCourse;
use App\CourseOrder;
use Auth;
use Carbon\Carbon;

class CourseOrderController extends MailController
{

    public function __construct()
    {
      $this->middleware('auth');
    }

    public function removeFromCart(Request $request)
    {
        $course = Course::where('id', $request['course_id'])->get()->pop();
        $cart = Cart::where('id', $request['cart_id'])->get()->pop();

        $totalPrice = $cart->total_price - $course->harga;
        $cart->update(['total_price' => $totalPrice]);
        CartCourse::where('id', $request['cart_course_id'])->delete();
        return redirect()->route('cart');
    }

    public function showCart()
    {
        $cart = Cart::where('user_id', Auth::user()->id)
                    ->where('is_active', 1)
                    ->get()->pop();


        if ($cart != null) {
            $courses = DB::table('courses')
                            ->rightJoin('cart_course', 'cart_course.course_id', '=',  'courses.id')
                            ->where('cart_course.cart_id', $cart->id)
                            ->get();

            if (count($courses) == 0) {
              return view('layouts/course-order/cart-empty');
            } else {
              return view('layouts/course-order/cart', ['courses' => $courses, 'cart' => $cart]);
              //dd($courses);
            }
        }
        else {
            return view('layouts/course-order/cart-empty');
        }
    }

    public function addToCart($course_id)
    {
        $cart = Cart::where('user_id', Auth::user()->id)
                    ->where('is_active', 1)
                    ->get()->pop();

        $course = Course::where('id', $course_id)->get()->pop();

        if ($cart != null) {
            $cartCourse = CartCourse::create([
              'cart_id' => $cart->id,
              'course_id' => $course_id,
            ]);

            $totalPrice = $course->harga + $cart->total_price;

            $cart->update(['total_price' => $totalPrice]);

            return redirect()->route('cart');
        }
        else {
            $newCart = Cart::create([
              'user_id' => Auth::user()->id,
              'total_price' => $course->harga,
              'is_active' => 1,
            ]);

            $cartCourse = CartCourse::create([
              'cart_id' => $newCart->id,
              'course_id' => $course_id,
            ]);

            return redirect()->route('cart');
        }

    }

    public function buyFreeCourse($course_id)
    {
      $course = Course::where('id', $course_id)->get()->pop();

      $newCart = Cart::create([
              'user_id' => Auth::user()->id,
              'total_price' => $course->harga,
              'is_active' => 1,
      ]);

      $cartCourse = CartCourse::create([
        'cart_id' => $newCart->id,
        'course_id' => $course_id,
      ]);

      $status_pembayaran = 3;
      $courseOrder = CourseOrder::create([
          'id_user' => Auth::user()->id,
          'cart_id' => $newCart->id,
          'status_pembayaran' => $status_pembayaran,
          'metode_pembayaran' => 0,
      ]);

      return redirect()->route('purchase-success');

    }

    public function purchaseSuccess()
    {
        return view('layouts/course-order/purchase-success');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // buat order baru
        $status_pembayaran = 3;
        $courseOrder = CourseOrder::create([
          'id_user' => Auth::user()->id,
          'cart_id' => $request['cart_id'],
          'status_pembayaran' => $status_pembayaran,
          'metode_pembayaran' => $request['payment_method'],
        ]);

        // buat cart tidak aktif lagi dan total harga + kode unik
        $cart = Cart::where('id', $request['cart_id'])->get()->pop();
        $price = $cart->total_price + $request['kode_unik'];
        $cart->update(['is_active' => 0, 'total_price' => $price]);

        // buat nomor order
        $noOrder = "";
        $date = date("Ymd");
        $simpleDate = substr($date, 2, 4);

        if ($courseOrder->id < 99) {
          $suffix = "00".$courseOrder->id;
          $noOrder = $simpleDate.$suffix;
          $courseOrder->update(['no_order' => $noOrder]);
        }
        else {
          $suffix = $courseOrder->id;
          $noOrder = $simpleDate.$suffix;
          $courseOrder->update(['no_order' => $noOrder]);
        }

        //$user_yang_membeli = User::find(Auth::user()->id);

        //$message = self::get_message_for_email($request['cart_id'], $noOrder);

        //self::html_email($user_yang_membeli->nama, $user_yang_membeli->email, Carbon::now()->format('d-m-Y'), $message);



        //return redirect()->route('course-order.show', $noOrder);
 
        return redirect()->route('kelas_saya');
	  }

    public function get_message_for_email($cart_id, $noOrder){

              $cart_courses = (Cart::find($cart_id))-> getCartCourses()->get();
              $nama_course = "";
              foreach ($cart_courses as $cart_course){
                $nama_course = $nama_course.", ".(Course::find($cart_course->course_id))->nama_course;
              }

            $message = "<p>Selamat! anda telah membeli kelas ".$nama_course." dengan nomor order <b>".$noOrder."</b>. Silahkan selesaikan pembayaran</p>";
            return $message;
    }

    public function test()
    {
        $date = date("Ymd");
        $simpleDate = substr($date, 2, 4);
        dd($simpleDate);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($noOrder)
    {
        $courseOrder = CourseOrder::where('no_order', $noOrder)->get()->pop();
        $cart = Cart::where('id', $courseOrder->cart_id)->get()->pop();
        if (Auth::user()->id == $courseOrder->id_user) {
            return view('layouts/course-order/review-order', ['courseOrder' => $courseOrder, 'cart' => $cart]);
        }
        else {
            return view('layouts/course-order/not-found');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function checkout(Request $request)
    {
        $cart = Cart::where('id', $request['cart_id'])->get()->pop();

        // kode unik untuk ditambah ke total harga pembelian
        //$rand = rand(0,999);
		    $rand = 0;
        return view('layouts/course-order/checkout', ['cart' => $cart, 'rand' => $rand]);
    }

    public function sendPaymentProof(Request $request)
    {
        $order = CourseOrder::where('id', $request['order_id'])->get()->pop();
        return view('layouts/course-order/payment-proof', ['order' => $order]);
    }

    public function storePaymentProof(Request $request)
    {
        $this->validate($request, [
            'paymentProof' => 'required|file|max:10000', // max 10MB
        ]);

        $paymentProof     = $request->file('paymentProof');
        $destinationPath  = 'bukti-bayar';
        $fileName         = $paymentProof->getClientOriginalName();
        $movea            = $paymentProof->move($destinationPath, $fileName);
        $path             = "bukti-bayar/{$fileName}";

        $order = CourseOrder::where('id', $request['order_id'])->update(['bukti_pembayaran' => $path]);

        return view('layouts/course-order/payment-proof-success');
    }


}
