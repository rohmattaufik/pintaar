<?php

namespace App\Http\Middleware;
use Illuminate\Http\Response;
use App\Http\Requests;
use Closure;
use Cookie;
use Illuminate\Support\Facades\Input;
use Auth;

class CookieTrackingChannelAcqusition
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
      if (!Auth::user() &&  ( Cookie::get('channel_acqusition') == NULL || Input::get('ch') != NULL)) {
        $channel_acqusition = Input::get('ch');
        if($channel_acqusition == NULL){$channel_acqusition = 10;}
        Cookie::queue('channel_acqusition', $channel_acqusition, 100);
      }
        return $next($request);
    }
}
