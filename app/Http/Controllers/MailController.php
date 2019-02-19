<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Mail;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class MailController extends Controller {

   	public function html_email($name, $email_user, $update_date, $courses_that_bougth, $noOrder, $totalPrice){
        $data = array('name'=>$name, 'update_date'=>$update_date, 'courses_that_bougth'=>$courses_that_bougth, 'noOrder'=> $noOrder,'totalPrice'=>  $totalPrice);
        Mail::send('layouts/email/payment', $data, function($message) use ($email_user, $name, $data) {
          $message->to($email_user, $name)
          			->subject('Silahkan Bayar Sebesar '. number_format($data['totalPrice'], 0, ',', '.'). ' untuk No. Pesanan '. $data['noOrder']);
          $message->from('pintaar.bantuan@gmail.com','Pintaar');
        });
        echo "HTML Email Sent. Check your inbox.";
   	}
}
