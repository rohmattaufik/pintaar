<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\User;
use App\Murid;
use DB;

class UserServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        User::created(function($model){
            if($model->id_role == 1){
                $user = User::whereEmail($model->email)->first();
                Murid::create([
                    'id_user'      => $user->id,
                    'asal_sekolah' => '',
                ]);
                
            }
        });

        // User::retrieved(function($model){
        //     if($model->id_role == 1){
        //         $model['asal_sekolah'] = (Murid::where('id_user', $model->id)->firstOrFail())->asal_sekolah;
        //     }
        // });

    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
