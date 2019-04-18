<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;
use App\Topik;
use Illuminate\Support\Facades\DB;
use App\KomentarTopik;
use Illuminate\Support\Facades\Input;
use Auth;
use App\PertanyaanTopik;

class PertanyaanTopikController extends Controller
{
    public function __construct()
    {
      $this->middleware('cookieTrackingChannelAcqusition');
      $this->middleware('auth');

    }


    public function create($idTopik)
    {
        $topik = Topik::whereId($idTopik)->first();
        $pertanyaanTopik = null;
        return view('layouts.pertanyaan_topik.tutor.form')->with('pertanyaanTopik', $pertanyaanTopik)->with('topik', $topik);
    }

    protected function update($id)
    {
        $pertanyaanTopik = PertanyaanTopik::whereId($id)->first();
        $topik = Topik::whereId($pertanyaanTopik->id_topik)->first();

        return view('layouts.pertanyaan_topik.tutor.form')->with('pertanyaanTopik', $pertanyaanTopik)->with('topik', $topik);
    }

    public function submit(Request $request)
    {
        $fotoProfil     = $request->file('gambar');
        $urlFoto       = "";
        if($fotoProfil != null){
            $destinationPath    = 'images/gambar_pertanyaan';
            $fotoName           = $fotoProfil->getClientOriginalName();
            $movea              = $fotoProfil->move($destinationPath, $fotoName);
            $urlFoto            = "{$fotoName}";
        }
        if($request->id == null)
        {
            $request->gambar = $urlFoto;
            PertanyaanTopik::create([
                "id_topik"          => $request->id_topik,
                "pertanyaan"        => $request->pertanyaan,
                "judul_pertanyaan"  => $request->judul_pertanyaan,
                'jawaban'           => $request->jawaban,
                'opsi_1'            => $request->opsi_1,
                'opsi_2'            => $request->opsi_2,
                'opsi_3'            => $request->opsi_3,
                'gambar'            => $urlFoto != "" ? $urlFoto : null,
                'opsi_4'            => $request->opsi_4
            ]);
        } else {
            if($urlFoto == null)
            {
                PertanyaanTopik::whereId($request->id)->update([
                    "id_topik"          => $request->id_topik,
                    "pertanyaan"        => $request->pertanyaan,
                    "judul_pertanyaan"  => $request->judul_pertanyaan,
                    'jawaban'           => $request->jawaban,
                    'opsi_1'            => $request->opsi_1,
                    'opsi_2'            => $request->opsi_2,
                    'opsi_3'            => $request->opsi_3,
                    'opsi_4'            => $request->opsi_4
                ]);
            } else
            {
                PertanyaanTopik::whereId($request->id)->update([
                    "id_topik"          => $request->id_topik,
                    "pertanyaan"        => $request->pertanyaan,
                    "judul_pertanyaan"  => $request->judul_pertanyaan,
                    'jawaban'           => $request->jawaban,
                    'gambar'            => $urlFoto,
                    'opsi_1'            => $request->opsi_1,
                    'opsi_2'            => $request->opsi_2,
                    'opsi_3'            => $request->opsi_3,
                    'opsi_4'            => $request->opsi_4
                ]);
            }


        }
        return redirect()->route('topik-detail', $request->id_topik);
    }

    public function delete($id)
    {
        PertanyaanTopik::whereId($id)->delete();
        return redirect()->back();
    }


}
