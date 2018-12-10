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
          self::update_status_pembayaran_when_invalid();
        })->daily();
    }
    protected function update_status_pembayaran_when_invalid()
    {
          DB::table('pembelian_courses')
                ->where('pembelian_courses.waktu_valid_pembelian'  , '='  , Carbon::now()->format('Y-m-d') )
                ->where('pembelian_courses.status_pembayaran', 3 )
                ->update(['status_pembayaran' => 6]);
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
