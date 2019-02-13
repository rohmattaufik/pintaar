<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Mail;
use App\Http\Requests;

class Email extends Model
{
    
    public function sendPaymentInfo($name, $email_user, $update_date, $courses_that_bougth, $noOrder, $totalPrice){
        $data = array('name'=>$name, 'update_date'=>$update_date, 'courses_that_bougth'=>$courses_that_bougth, 'noOrder'=> $noOrder,'totalPrice'=>  $totalPrice);
        Mail::send('layouts/email/payment', $data, function($message) use ($email_user, $name, $data) {

          $message->to($email_user, $name)->subject('Silahkan Bayar Kelas Kamu Sebesar Rp '. number_format($data['totalPrice'], 0, ',', '.'));
          $message->from('pintaar.bantuan@gmail.com','Pintaar');
        });
        return true;
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
      	return true;
   	}
}
