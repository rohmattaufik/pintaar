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

          $message->to($email_user, $name)->subject('Silahkan Bayar Kelas Kamu Sebesar '. number_format($data['totalPrice'], 0, ',', '.'));
          $message->from('pintaar.bantuan@gmail.com','Pintaar');
        });
        echo "HTML Email Sent. Check your inbox.";
   	}


    public function sendPaymentStatus($name, $email_user, $boughtCourses, $noOrder, $paymentStatus) {
      	$data = array('name'=>$name, 'boughtCourses'=>$boughtCourses, 'noOrder'=> $noOrder);
      	
        if ($paymentStatus == 3) {
        	Mail::send('layouts/email/payment-success', $data, function($message) use ($email_user, $name, $data) {
           	$message->to($email_user, $name)->subject('Ayo Belajar Sekarang! Kelas Sudah Dapat Diakses.');
           	$message->from('pintaar.bantuan@gmail.com','Pintaar');
        	});
      	}
        else {
          Mail::send('layouts/email/payment-fail', $data, function($message) use ($email_user, $name, $data) {
            $message->to($email_user, $name)->subject('Pembayaran Kelas Belum Berhasil');
            $message->from('pintaar.bantuan@gmail.com','Pintaar');
          });
        }
      	echo "Email Sent. Check your inbox.";
   	}

}
