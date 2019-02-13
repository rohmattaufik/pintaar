<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Mail;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class MailController extends Controller {

   	public function html_email($name, $email_user, $update_date, $courses_that_bougth, $noOrder, $totalPrice){
        $data = array('name'=>$name, 'update_date'=>$update_date, 'courses_that_bougth'=>$courses_that_bougth, 'noOrder'=> $noOrder,'totalPrice'=>  $totalPrice);
        Mail::send('mail', $data, function($message) use ($email_user, $name, $data) {

          	$message->to($email_user, $name)->subject
            ('Silahkan Bayar Kelas Anda Sebesar '.  $data['totalPrice']);
         	$message->from('travel.lust23@gmail.com','Pintaar');
        });
        echo "HTML Email Sent. Check your inbox.";
   	}


    public function statusChanged($name, $email_user, $update_date, $courses_that_bougth, $noOrder, $totalPrice){
      	$data = array('name'=>$name, 'update_date'=>$update_date, 'courses_that_bougth'=>$courses_that_bougth, 'noOrder'=> $noOrder,'totalPrice'=>  $totalPrice);
      	
      	Mail::send('mail', $data, function($message) use ($email_user, $name, $data) {
         	$message->to($email_user, $name)->subject('Ayo belajar sekarang! Kelas sudah dapat diakses']);
         	$message->from('pintaar.bantuan@gmail.com','Pintaar');
      	});
      	
      	echo "Email Sent. Check your inbox.";
   	}

}
