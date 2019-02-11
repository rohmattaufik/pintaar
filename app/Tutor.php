<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tutor extends Model
{
    protected $table = 'tutors';

    protected $fillable = [
        'id_user', 'name', 'profile_photo', 'lama_mengajar', 'pendidikan', 'story'
    ];

  public function users()
  {
    return $this->hasOne("App\User", "id", "id_user");
  }

}
