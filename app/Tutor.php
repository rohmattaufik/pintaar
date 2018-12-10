<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tutor extends Model
{
    protected $table = 'tutors';

    protected $fillable = [
        'id_user', 'mata_pelajaran', 'video_profil', 'lama_mengajar', 'pendidikan', 'story'
    ];

  public function users()
  {
    return $this->hasOne("App\User", "id", "id_user");
  }

}
