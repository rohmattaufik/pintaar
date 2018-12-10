<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PembelianCourse extends Model
{

    protected $table = 'pembelian_courses';

    protected $fillable = [
        'id_murid', 'cart_id', 'status_pembayaran',
        'metode_pembayaran', 'bukti_pembayaran', 'waktu_valid_pembelian'
    ];

    public function course()
    {
        return $this->hasOne('App\Course', 'id', 'id_course');
    }

    public function statusPembayaran()
    {
        return $this->hasOne('App\StatusPembayaran', 'id', 'status_pembayaran');
    }

}
