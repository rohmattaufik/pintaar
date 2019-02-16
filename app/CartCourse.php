<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CartCourse extends Model
{
    protected $table = 'cart_course';

	protected $fillable = ['cart_id', 'course_id'];

	public function getCourse()
    {
        return $this->hasOne('App\Course','id', 'course_id');
    }
}
