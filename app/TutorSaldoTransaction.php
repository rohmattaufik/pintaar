<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Auth;


class TutorSaldoTransaction extends Model
{
    //

    	protected $table = 'tutor_saldo_transaction';

      protected $fillable = [
    		'id_tutor', 'withdraw_amount', 'withdraw_status'
    	];

      public function get_withdraw_status()
      {
        return $this->hasOne("App\TutorSaldoWithdrawStatus", "id", "withdraw_status");
      }

}
