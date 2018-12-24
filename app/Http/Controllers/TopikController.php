<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;
use App\Topik;
use Illuminate\Support\Facades\DB;
use App\KomentarTopik;
use App\Notification;
use Illuminate\Support\Facades\Input;
use Auth;
use App\LogUserTontonTopik;
use App\ReplyKomentarTopik;
use App\FileTopik;
use App\PertanyaanTopik;

class TopikController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = DB::table('topiks')->get();

        return $courses;

        return view('layouts.topiks.index');
    }

    public function detail(Request $request, $id)
    {

        $topik= DB::table('topiks')
                ->where('topiks.id', '=', $id)
                ->get()->first();
        
        $file_topik = FileTopik::whereIdTopik($id)->get();

        $questions= DB::table('pertanyaan_topiks')
                    ->where('pertanyaan_topiks.id_topik', '=', $id)
                    ->get();

        $id_course = $topik -> id_course;

        $id_user_tutor= DB::table('courses')
                            ->select('users.id as id_user_tutor' )
                            ->leftJoin('tutors', 'tutors.id', '=',  'courses.id_tutor')
                            ->leftJoin('users', 'users.id', '=', 'tutors.id_user')
                            ->where('courses.id', '=', $id_course)
                            ->get()->first()->id_user_tutor;


        $list_id_topik =DB::table('topiks')
            ->select('id', 'judul_topik')
            ->where('topiks.id_course', '=', $id_course)
            ->orderBy('topiks.created_at','ASC')
            ->get();


        #topik pertama selalu  digratiskan
        if($list_id_topik-> first()-> id != $id){

        $status_pembayaran = DB::table('pembelian_courses')
                            ->select('status_pembayaran')
                            ->leftJoin('cart', 'cart.id', '=', 'pembelian_courses.cart_id')
                            ->leftJoin('cart_course', 'cart_course.cart_id', '=', 'pembelian_courses.cart_id')
                            ->where('cart_course.course_id', $id_course)
                            ->where('cart.user_id', Auth::user()->id)
                            ->get()->first();
        #jika yang membuka adalah tutor pembuat kelas tersebut
        if(Auth::user()-> id == $id_user_tutor){

            $status_pembayaran = new \stdClass();
            $status_pembayaran->status_pembayaran = 3;
        }

        ##cek pembayaran sudah lunas apa belum
        if($status_pembayaran == null || $status_pembayaran -> status_pembayaran != 3 ){
            return redirect()->route('course', ['id' => $id_course]);
        }
        }

        self::save_log_user_tonton_topik($id);

        $topik_before ;
        $topik_after;
        $index = 0 ;
        foreach ($list_id_topik as $id_topik) {

            if($id_topik->id == $topik->id) {
            $topik_before =$list_id_topik ->get($index - 1);
            $topik_after = $list_id_topik ->get($index + 1);
            break;
            }
            $index++;
        }


		$comments_and_user = DB::table('komentar_topiks')
          ->select('komentar_topiks.komentar', 'users.nama', 'komentar_topiks.created_at','komentar_topiks.id')
					->where('komentar_topiks.id_topik', '=', $id)
					->leftJoin('users', 'users.id', '=', 'komentar_topiks.id_user')
          ->get();


          $comments_and_user = KomentarTopik::where('id_topik', $id)
                              ->orderBy('created_at', 'desc')
                              ->get();
        //dd($comments_and_user);
        return view('layouts.topik.detail', ["topik_after" => $topik_after, "topik_before" => $topik_before,"questions" => $questions,"topik" => $topik, "comments_and_user" => $comments_and_user, "file_topik" => $file_topik ]);
    }

    public function save_log_user_tonton_topik($id_topik){

        $log_user_tonton_topik = LogUserTontonTopik::where('id_user', Auth::user()->id)
                                     ->where('id_topik', $id_topik) ;

        if($log_user_tonton_topik -> get()->first() == null)
        {
          $log_user_tonton_topik = new LogUserTontonTopik;
          $log_user_tonton_topik -> id_user = Auth::user()->id;
          $log_user_tonton_topik -> id_topik = $id_topik;
          $log_user_tonton_topik -> save();
        }
    }

  	public function topik_komentar_post(Request $request, $id)
  	{

      if ($request->body_comment_reply != null) {
        // kirim notifikasi ke user terkait
        $commentUser = array(); // array user yang terkait
        // komentar level 1
        $comment1 = KomentarTopik::where('id', $request->id_komentar_topik)->get()->first();
        if (Auth::user()->id != $comment1->id_user) {
            array_push($commentUser, $comment1->id_user);
        }

        // komentar level 2
        $comment2 = ReplyKomentarTopik::where('id_komentar_topik', $request->id_komentar_topik)->get();

        foreach ($comment2 as $singleComment) {
          if (Auth::user()->id != $singleComment->id_user && !in_array($singleComment->id_user, $commentUser)) {
            array_push($commentUser, $singleComment->id_user);
          }
        }

        foreach ($commentUser as $idUser) {
          $notification = Notification::create([
              "id_user"         => $idUser,
              "type"            => 1,
              "id_destination"  => $comment1->id,
              "description"     => "Seseorang telah membalas komentar anda pada topik ini",
              'url'             => "topik/".$id
          ]);
        }



        // simpan komentar level 2
        $reply_komentar_topik = new ReplyKomentarTopik;
  			$reply_komentar_topik->id_user = Auth::user()->id;
  			$reply_komentar_topik->id_komentar_topik = $request->id_komentar_topik;
  			$reply_komentar_topik->komentar =$request->body_comment_reply ;
  			$reply_komentar_topik->save();

        //dd($commentUser);
        return redirect(route('topik', ['id' => $id]) . '#comment'.$comment1->id);

      }
      else {
  			$comment = new KomentarTopik;
  			$comment->id_user = Auth::user()->id;
  			$comment->id_topik = $id;
  			$comment->komentar = Input::get('body_comment');
  			$comment->save();

        return redirect(route('topik', ['id' => $id]) . '#commentTitle');
      }


    }

    // TUTOR PAGE

    public function create($idCourse)
    {
        $course = Course::whereId($idCourse)->first();
        $topik = null;
        return view('layouts.topik.tutor.form')->with('course', $course)->with('topik', $topik);
    }

    protected function update($id)
    {
        $topik = Topik::whereId($id)->first();
        $file_topik = FileTopik::whereIdTopik($id)->get();
        $course = Course::whereId($topik->id_course)->first();

        return view('layouts.topik.tutor.form')->with('course', $course)->with('topik', $topik)->with('attachments', $file_topik);
    }

    public function submit(Request $request)
    {
        # get video
        $videoTopik   = $request->file('video');
        $urlVideo       = "";
        if($videoTopik != null){
            $destinationPath    = 'video/video_topik';
            $videoName          = $videoTopik->getClientOriginalName();
            $movea              = $videoTopik->move($destinationPath, $videoName);
            $urlVideo            = "{$videoName}";
        }
        # get attachments
        $attachment   = $request->file('file_topik');
        $urlAttachment       = "";
        $att_name ="";
        if($attachment != null){
            $destinationPath    = 'attachments';
            $att_name           = $attachment->getClientOriginalName();
            $move               = $attachment->move($destinationPath, $att_name);
            $urlAttachment      = "{$att_name}";
        }
        $request['video'] = $urlVideo;
        $id_topik = "";
        if($request->id == null)
        {
            $topik =    Topik::create([
                "id_course"    => $request->id_course,
                "judul_topik"  => $request->judul_topik,
                "penjelasan"   => $request->penjelasan,
                'video'        => $urlVideo
            ]);
            $id_topik = $topik->id;
            if ($attachment != null)
            {
                FileTopik::create([
                    "id_topik"     => $id_topik,
                    "file_name"    => $att_name,
                    "url"          => $urlAttachment,
                    'is_active'    => 1
                ]);
            }
        } else {
            $id_topik = $request->id;
            if($urlVideo != "")
            {
                Topik::whereId($request->id)->update([
                    "id_course"    => $request->id_course,
                    "judul_topik"  => $request->judul_topik,
                    "penjelasan"   => $request->penjelasan,
                    'video'        => $urlVideo
                ]);
            } else {
                Topik::whereId($request->id)->update([
                    "id_course"    => $request->id_course,
                    "judul_topik"  => $request->judul_topik,
                    "penjelasan"   => $request->penjelasan
                ]);
            }
            if ($attachment != null)
            {
                FileTopik::create([
                    "id_topik"     => $id_topik,
                    "file_name"    => $att_name,
                    "url"          => $urlAttachment,
                    'is_active'    => 1
                ]);
            }
        }
        return redirect()->route('topik-detail', $id_topik);
    }

    public function get_topik_detail( $id )
    {
        $topik = Topik::whereId($id)->with('pertanyaanTopiks')->first();
        return view('layouts.topik.tutor.detail')->with('topik', $topik);
    }


    // public function store_pertanyaan_topik(Request $request)
    // {
    //     PertanyaanTopik::create($request->all());
    // }

    // public function update_pertanyaan_topik($id, Request $request)
    // {
    //     PertanyaanTopik::whereId($id)->update($request->all());
    // }

    public function delete($id)
    {
        Topik::whereId($id)->delete();
        return redirect()->back();
    }
}
