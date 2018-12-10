<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $table = 'cart';

	protected $fillable = ['user_id', 'total_price', 'is_active'];

	public function getCartCourses()
    {
        return $this->hasMany('App\CartCourse', 'cart_id');

    }

}
