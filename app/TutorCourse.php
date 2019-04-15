<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TutorCourse extends Model
{
    protected $table = 'tutor_course';

    protected $fillable = ['course_id', 'tutor_id'];

	public function tutor()
	{
	   return $this->hasOne('App\Tutor', 'id', 'tutor_id');
	}

	public function store($request)
	{
		$profilePhoto     = $request->file('tutor_photo');
		$urlPhoto       = "";
		if ($profilePhoto != null) {
			$destinationPath   = 'images/gambar_course';
			$photoName         = bcrypt($profilePhoto->getClientOriginalName());
			$move              = $profilePhoto->move($destinationPath, $photoName);
			$urlPhoto          = "{$photoName}";
		}

		if ($request->tutor_id == null) {
			$tutor = Tutor::create([
				"name"  => $request->tutor_name,
				"profile_photo"  => $urlPhoto,
				"story"         => $request->deskripsi
			]);

			$tutorCourse = TutorCourse::create([
				"course_id"  => $request->course_id,
				"tutor_id"         => $tutor->id
			]);
		} 
		else {
			$tutor = Tutor::where('id', $request->tutor_id)->first();
			$tutor->name = $request->tutor_name;
			$tutor->story = $request->deskripsi;
			
			if ($profilePhoto != null) {
				$tutor->profile_photo = $urlPhoto;
			}

			$tutor->save();
		}

		return $tutor;
	}
}
