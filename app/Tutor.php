<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Auth;
use App\User;

class Tutor extends Model
{
	protected $table = 'tutors';

	protected $fillable = [
		'id_user', 'name', 'profile_photo', 'nama_bank', 'no_rekening', 'nama_rekening', 'story'
	];

	public function user()
	{
		return $this->hasOne("App\User", "id", "id_user");
	}

	public function edit(Request $request)
	{
		$tutor = $this::where('id_user', Auth::user()->id)->first();
		$user = User::where('id', Auth::user()->id)->first();

		$fotoProfil     = $request->file('foto');
		$urlFoto       = "";
		
		if ($fotoProfil != null) {
			$destinationPath = 'user-poto';
			$fotoName   = $fotoProfil->getClientOriginalName();
			$move		= $fotoProfil->move($destinationPath, $fotoName);
			$urlFoto 	= "user-poto/{$fotoName}";
			$user->foto = $urlFoto;
		}

		$user->nama = $request->nama;
		
		$tutor->nama_bank = $request->nama_bank;
		$tutor->no_rekening = $request->no_rekening;
		$tutor->nama_rekening = $request->nama_rekening;
		
		$tutor->update();    
		$user->update();
		
	}

}
