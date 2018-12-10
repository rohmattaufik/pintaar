<?php

namespace App\Http\Controllers;

use App\User;
use App\Murid;
use App\PembelianCourse;
use App\Notification;
use Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class UserController
{

    public function index()
    {
        if( Auth::user() )
        {
            $idUser          = Auth::user()->id;
            // retrive user information
            $user            = User::getStudent($idUser)->firstOrFail();
            $user['murid']   = User::getStudent($idUser)->first()->murid;



            $transaksi = DB::table('courses')
                ->select( 'nama_course', 'harga' , 'status_pembayarans.status as status_pembayaran', 'bukti_pembayaran')
                ->leftJoin('rating_courses', 'rating_courses.id_course', '=', 'courses.id')
                ->leftJoin('cart_course', 'cart_course.course_id', '=', 'courses.id')
                ->leftJoin('cart', 'cart.id', '=', 'cart_course.cart_id')
                ->leftJoin('pembelian_courses', 'pembelian_courses.cart_id', '=', 'cart.id')
                ->leftJoin('status_pembayarans', 'status_pembayarans.id', '=', 'pembelian_courses.status_pembayaran')
                ->where('cart.user_id', Auth::user()->id)
                ->get();


            $user['transaksi']  = $transaksi;
            //dd($user);
            return view('layouts.user_profile.index')->with('user', $user);
        }

        return redirect()->route('login');
    }

    public function edit(Request $request)
    {
        if( Auth::user() )
        {
            $idUser         = Auth::user()->id;
            return $this->update($request, $request->id_user);
        }
        return redirect()->route('login');
    }

    public function update(Request $request, $idUser)
    {
        $fotoProfil     = $request->file('foto');
        $urlFoto       = "";
        if($fotoProfil != null){
            $destinationPath    = 'user-poto';
            $fotoName           = $fotoProfil->getClientOriginalName();
            $movea              = $fotoProfil->move($destinationPath, $fotoName);
            $urlFoto            = "user-poto/{$fotoName}";
        }
        User::whereId($idUser)->update([
            'nama'      => $request['nama'],
            'email'     => $request['email'],
            'alamat'    => $request['alamat'] ? $request['alamat'] : "",
            'foto'      => $urlFoto
        ]);
        Murid::whereId($request->id_murid)->update([
            'asal_sekolah'  => $request['asal_sekolah'],
        ]);

        return redirect()->back();
    }

    public function kelas_saya(){

        $list_courses_that_has_bought = DB::table('courses')
            ->select( DB::raw('sum(jumlah_rating)/count(jumlah_rating) as rating') , 'nama_course','users.nama', 'courses.id', 'harga', 'courses.foto', 'deskripsi')
            ->leftJoin('tutors', 'courses.id_tutor', '=',  'tutors.id')
            ->leftJoin('users', 'users.id', '=', 'tutors.id_user')
            ->leftJoin('rating_courses', 'rating_courses.id_course', '=', 'courses.id')
            ->leftJoin('cart_course', 'cart_course.course_id', '=', 'courses.id')
            ->leftJoin('cart', 'cart.id', '=', 'cart_course.cart_id')
            ->leftJoin('pembelian_courses', 'pembelian_courses.cart_id', '=', 'cart.id')
            ->where('cart.user_id', Auth::user()->id)
            ->where('pembelian_courses.status_pembayaran', 3 )
            ->groupBy('courses.id', 'nama_course','users.nama', 'courses.id', 'harga', 'courses.foto', 'deskripsi')
            ->get();





            return view('layouts.user_profile.kelas-saya', ["list_courses_that_has_bought"=>$list_courses_that_has_bought]);


    }

    public function change_password(){
        if(Auth::user())
        {
            return view('layouts.user_profile.change_password')->with('user', Auth::user());
        } 
        return redirect()->route('login');
    }

    public function change_password_submit(Request $request){
        if(Auth::user())
        {
           User::whereId(Auth::user()->id)->update([
               "password"   => bcrypt($request->password),
           ]);
           Auth::logout();
           return redirect()->route('login');
        } 
        return redirect()->route('login');
    }


    public function getAllNotifications() {
        $notifications = Notification::where('id_user', Auth::user()->id)->orderBy('created_at', 'desc')->get();
        //dd($notifications);
        return view('layouts/user_profile/all-notifications', ['notifications' => $notifications]);
    }

    public function visitAndDeleteNotification(Request $request) {
        $notification = Notification::where('id', $request['notification_id'])->get()->first();
        $id = substr($notification->url, 6);
        $notification->delete();
        return redirect(route('topik', ['id' => $id]) . '#comment'.$notification->id_destination);
    }
}
