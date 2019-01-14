<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Tutor;
use App\User;
use Illuminate\Support\Facades\DB;


class TutorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('layouts/tutor/home-tutor');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tutor = Tutor::where('id', $id)->get()->pop();
        $user = User::where('id', $tutor->id_user)->get()->pop();
        return view('layouts/tutor/profile', ['tutor' => $tutor, 'user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tutor = Tutor::where('id', $id)->get()->pop();
        $user = User::where('id', $tutor->id_user)->get()->pop();
        return view('layouts/tutor/edit', ['tutor' => $tutor, 'user' => $user]);
    }

    public function history_pembelian_course(){


          if(Auth::user()->id_role == 2){
            $tutor = Tutor::where('id_user',  Auth::user()->id)->first()->id;

            $list_pembelian_course = DB::table('pembelian_courses')
                                    ->select(DB::raw('pembelian_courses.id as id_pembelian'),'nama', 'email','total_price','bukti_pembayaran','status',  DB::raw('pembelian_courses.created_at as waktu_order'))
                                    ->leftJoin('cart', 'cart.id', '=', 'pembelian_courses.cart_id')
                                    ->leftJoin('cart_course', 'cart_course.cart_id', '=', 'pembelian_courses.cart_id')
                                    ->leftJoin('users', 'users.id', '=', 'cart.user_id')
                                    ->leftJoin('status_pembayarans', 'status_pembayarans.id', '=', 'pembelian_courses.status_pembayaran')
                                    ->leftJoin('courses', 'courses.id', '=', 'cart_course.course_id')
                                    ->where('pembelian_courses.status_pembayaran',3 )
                                    ->where('courses.id_tutor', $tutor)
                                    ->orderBy('pembelian_courses.created_at','DESC')
                                    ->get();

          $list_revenue_permonth = DB::table('pembelian_courses')
                                  ->select(DB::raw("date_trunc('month', pembelian_courses.updated_at) as month") ,DB::raw("(SUM(total_price)) as total_price") ,DB::raw("(count(*)) as jumlah_pembelian"))
                                  ->leftJoin('cart', 'cart.id', '=', 'pembelian_courses.cart_id')
                                  ->leftJoin('cart_course', 'cart_course.cart_id', '=', 'pembelian_courses.cart_id')
                                  ->leftJoin('users', 'users.id', '=', 'cart.user_id')
                                  ->leftJoin('status_pembayarans', 'status_pembayarans.id', '=', 'pembelian_courses.status_pembayaran')
                                  ->leftJoin('courses', 'courses.id', '=', 'cart_course.course_id')
                                  ->where('pembelian_courses.status_pembayaran',3 )
                                  ->groupby(DB::raw("date_trunc('month', pembelian_courses.updated_at)"))
                                  ->orderBy(DB::raw("date_trunc('month', pembelian_courses.updated_at)"),'DESC')
                                  ->where('courses.id_tutor', $tutor)
                                  ->get();



             return view('layouts.tutor.list-pembelian-courses', ["list_pembelian_course"=>$list_pembelian_course, "list_revenue_permonth" => $list_revenue_permonth]);
        }
        else{

          return redirect()->route('home');
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $fotoProfil     = $request->file('foto');
        $urlFoto       = "";
        
        if($fotoProfil != null){
            $destinationPath    = 'user-poto';
            $fotoName           = $fotoProfil->getClientOriginalName();
            $movea              = $fotoProfil->move($destinationPath, $fotoName);
            $urlFoto            = "user-poto/{$fotoName}";
        }

        $input_user = [
            "nama"  => $request->nama,
            "foto"  => $urlFoto
        ];
        //dd($input_user);
        $videoProfil     = $request->file('video_profil');
        $urlVideo       = "";
        if($videoProfil != null){
            $destinationPath    = 'video/video_profil';
            $videoName           = $videoProfil->getClientOriginalName();
            $movea              = $videoProfil->move($destinationPath, $videoName);
            $urlVideo            = "video/video_profil/{$videoName}";
        }


        $input_tutor = [
            "mata_pelajaran"    => $request->mata_pelajaran,
            "video_profil"      => $urlVideo,
            "lama_mengajar"     => $request->lama_mengajar,
            "pendidikan"        => $request->pendidikan,
            "story"             => $request->story
        ];

        $tutor = Tutor::whereId($id)->update($input_tutor);
        $tutor = Tutor::find($id);
        User::whereId($tutor['id_user'])->update($input_user);
        return redirect('tutor/'. $id);
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
}
