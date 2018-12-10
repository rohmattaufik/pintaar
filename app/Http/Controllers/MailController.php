<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Mail;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class MailController extends Controller {

   public function html_email($name, $email_user, $update_date, $pesan){
      $data = array('name'=>$name, 'update_date'=>$update_date, 'pesan'=>$pesan);
      Mail::send('mail', $data, function($message) use ($email_user, $name) {

         $message->to($email_user, $name)->subject
            ('Pemberitahuan dari ICOURSE');
         $message->from('travel.lust23@gmail.com','ICOURSE');
      });
      echo "HTML Email Sent. Check your inbox.";
   }

}
