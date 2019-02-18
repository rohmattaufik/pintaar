<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {

	
		$schedule->call(function () {
          self::job_send_1_hour_email_reminder_order();
        })->hourly();
        
		
		$schedule->call(function () {
          self::job_send_1_day_email_reminder_order();
        })->dailyAt('02:00');
		
		
		   
    }
	
	protected function job_send_1_hour_email_reminder_order()
    {

		$pembelians_course_not_pay_yet= DB::table('pembelian_courses')
					->select('pembelian_courses.id_user', 'pembelian_courses.cart_id', 'cart.total_price', 'pembelian_courses.no_order',  'pembelian_courses.created_at')
					->leftJoin('cart', 'cart.id', '=', 'pembelian_courses.cart_id')
					->leftJoin('users', 'users.id', '=', 'cart.user_id')
					->leftJoin('status_pembayarans', 'status_pembayarans.id', '=', 'pembelian_courses.status_pembayaran')
					->where('cart.total_price', '>', 0)
					->where('pembelian_courses.created_at', '>=', Carbon::now()->subHour())
					->where('pembelian_courses.status_pembayaran', 1 )
					->get();
					

		foreach ($pembelians_course_not_pay_yet as $pembelian_course_not_pay_yet){ 
		
			
			app()->call('App\Http\Controllers\CourseOrderController@send_email_reminder', 
				[$pembelian_course_not_pay_yet->id_user, 
				 $pembelian_course_not_pay_yet->cart_id,
				 $pembelian_course_not_pay_yet->total_price, 
				 $pembelian_course_not_pay_yet->no_order ]);
		}
	}
	
    protected function job_send_1_day_email_reminder_order()
    {

		$pembelians_course_not_pay_yet= DB::table('pembelian_courses')
					->select('pembelian_courses.id_user', 'pembelian_courses.cart_id', 'cart.total_price', 'pembelian_courses.no_order',  'pembelian_courses.created_at')
					->leftJoin('cart', 'cart.id', '=', 'pembelian_courses.cart_id')
					->leftJoin('users', 'users.id', '=', 'cart.user_id')
					->leftJoin('status_pembayarans', 'status_pembayarans.id', '=', 'pembelian_courses.status_pembayaran')
					->where('cart.total_price', '>', 0)
					->whereDate('pembelian_courses.created_at', '=', Carbon::yesterday()->toDateString())
					->where('pembelian_courses.status_pembayaran', 1 )
					->get();
					

		foreach ($pembelians_course_not_pay_yet as $pembelian_course_not_pay_yet){ 
		
			
			app()->call('App\Http\Controllers\CourseOrderController@send_email_reminder', 
				[$pembelian_course_not_pay_yet->id_user, 
				 $pembelian_course_not_pay_yet->cart_id,
				 $pembelian_course_not_pay_yet->total_price, 
				 $pembelian_course_not_pay_yet->no_order ]);
		}
	}
	
	
    /**
     * Register the Closure based commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        require base_path('routes/console.php');
    }
}
