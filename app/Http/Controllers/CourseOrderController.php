<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Course;
use App\Cart;
use App\User;
use Mail;
use App\PembelianCourse;
use App\CartCourse;
use App\CourseOrder;
use Auth;
use Carbon\Carbon;
use App\Mail\CourseOrderMail;

class CourseOrderController 
{

    
    public function removeFromCart(Request $request)
    {
        $cartCourse = CartCourse::whereId($request['cart_course_id']);
        $cartCourse->delete();
        return redirect()->route('cart');
    }

    public function showCart()
    {
        $cart = Cart::where('user_id', Auth::user()->id)
                    ->where('is_active', 1)
                    ->get()->pop();


        if ($cart != null) {
            if (count($cart->getCartCourses) == 0) {
              return view('layouts/course-order/cart-empty');
            } else {
              $totalPrice = 0;
              
              foreach ($cart->getCartCourses as $key => $cartCourse) {
                $totalPrice += $cartCourse->course_price;
              }

              $cart->update(['total_price' => $totalPrice]);
              
              return view('layouts/course-order/cart', ['cart' => $cart]);
              //dd($courses);
            }
        }
        else {
            return view('layouts/course-order/cart-empty');
        }
    }

    public function buyCourse($course_id)
    { 
        $course = Course::where('id', $course_id)->get()->pop();

        if ($course->harga == 0) {
          $cart = $this->addCourseToNewCart($course);
          $status_pembayaran = 6;
          $paymentMethod = null;
          $courseOrder = $this->store($cart, $paymentMethod, $status_pembayaran);
          return redirect()->route('purchase-success')->with('free-course', 'true');;
        }

        else {
          $cart = Cart::where('user_id', Auth::user()->id)
                      ->where('is_active', 1)
                      ->get()->pop();

          if ($cart != null) {
              $cartCourseModel = new CartCourse;
              $cartCourse = $cartCourseModel->createCartCourse($cart, $course);
              
              return redirect()->route('cart');
          }
          else {
              $cart = $this->addCourseToNewCart($course);
              return redirect()->route('cart');
          }
        }

    }

    public function addCourseToNewCart(Course $course)
    {
        $newCart = Cart::create([
                'user_id' => Auth::user()->id,
                'total_price' => $course->harga,
                'is_active' => 1,
        ]);

        $cartCourseModel = new CartCourse;
        $cartCourse = $cartCourseModel->createCartCourse($newCart, $course);

        return $newCart;
    }

    public function checkout(Request $request)
    {
        $cart = Cart::where('id', $request['cart_id'])->get()->pop();

        return view('layouts/course-order/checkout', ['cart' => $cart]);          
               
    }

    public function checkoutSuccess(Request $request)
    {
        $cart = Cart::where('id', $request['cart_id'])->get()->pop();
        $status_pembayaran = 1;
        $paymentMethod = $request['payment_method'];
        $courseOrder = $this->store($cart, $paymentMethod, $status_pembayaran);
        return redirect()->route('review-order', $courseOrder->no_order);                       
    }


    public function purchaseSuccess()
    {
        return view('layouts/course-order/purchase-success');
    }

    public function store(Cart $cart, $paymentMethod, $status_pembayaran)
    {
        $cart->update(['is_active' => 0]);

        // order baru       
        $courseOrder = PembelianCourse::create([
          'id_user' => Auth::user()->id,
          'cart_id' => $cart->id,
          'status_pembayaran' => $status_pembayaran,
          'metode_pembayaran' => $paymentMethod,
        ]);

        // nomor order
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
	

		    self::send_email_reminder(Auth::user()->id, $cart->id, $cart->total_price, $noOrder);
		
		
        return $courseOrder;

	}
	
	public function send_email_reminder($user_id, $cart_id, $total_price, $noOrder) {
	
    	if($total_price != 0) {
	
			$user_that_bought = User::find($user_id);

			$courses_that_bougth = self::get_courses_that_bougth($cart_id);
		
			self::html_email($user_that_bought->nama, $user_that_bought->email, Carbon::now()->format('d-m-Y'), $courses_that_bougth, $noOrder, $total_price);
		}
		
	}
	
	
	public function html_email($name, $email_user, $update_date, $courses_that_bougth, $noOrder, $totalPrice){
        $data = array('name'=>$name, 'update_date'=>$update_date, 'courses_that_bougth'=>$courses_that_bougth, 'noOrder'=> $noOrder,'totalPrice'=>  $totalPrice);
        Mail::send('layouts/email/payment', $data, function($message) use ($email_user, $name, $data) {

          $message->to($email_user, $name)->subject('Silahkan Bayar Kelas Kamu Sebesar '. number_format($data['totalPrice'], 0, ',', '.'));
          $message->from('pintaar.bantuan@gmail.com','Pintaar');
        });
        echo "HTML Email Sent. Check your inbox.";
   	}
	
    public function get_courses_that_bougth($cart_id) {


              $cart_courses = (Cart::find($cart_id))-> getCartCourses()->get();
              $nama_course = "";
              foreach ($cart_courses as $cart_course){
                $nama_course = $nama_course.(Course::find($cart_course->course_id))->nama_course.', ';
              }

            return $nama_course;
    }


    public function show($order_no)
    {
        $courseOrder = DB::table('pembelian_courses')
                    ->leftJoin('status_pembayarans', 'status_pembayarans.id', '=', 'pembelian_courses.status_pembayaran')
                    ->where('pembelian_courses.no_order', $order_no)
                    ->get()->pop();
        $cart = Cart::whereId($courseOrder->cart_id)->first();
                
        if (Auth::user()->id == $courseOrder->id_user) {
            return view('layouts/course-order/review-order', ['courseOrder' => $courseOrder, 'cart' => $cart]);
        }
        else {
            return view('layouts/course-order/not-found');
        }
    }

    public function edit($id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }

    public function sendPaymentProof($order_no)
    {
        $order = CourseOrder::where('no_order', $order_no)->get()->pop();
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

        $order = CourseOrder::where('id', $request['order_id'])->update(['bukti_pembayaran' => $path, 'status_pembayaran' => 2]);

        return redirect()->route('purchase-success');
    }

    public function showAllCourseOrder()
    {
        $order = DB::table('pembelian_courses')
                ->select('pembelian_courses.created_at', 'no_order', 'cart.total_price', 'status_pembayaran', 'metode_pembayaran', 'status_pembayarans.status as status_pembayaran_info')
                ->leftJoin('cart', 'cart.id', '=', 'pembelian_courses.cart_id')
                ->leftJoin('status_pembayarans', 'status_pembayarans.id', '=', 'pembelian_courses.status_pembayaran')
                ->where('pembelian_courses.id_user', Auth::user()->id)
                ->orderBy('pembelian_courses.created_at','DESC')
                ->get();

        return view('layouts/course-order/all-course-order')->with('order', $order);
    }


}
