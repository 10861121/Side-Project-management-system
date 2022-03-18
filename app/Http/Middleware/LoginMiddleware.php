<?php

namespace App\Http\Middleware;

use Closure;
use DB;
use Session;
use Redirect;
class LoginMiddleware
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
        DB::table('user_session')
            ->where('created','<',time()-3600)
            ->delete();
        $user=DB::table('user_session')
            ->where('user_session.session_id',Session::getId())
            ->first();
        if (empty($user->u_id)) {
            return Redirect::action('LoginController@Login')->with('messages','登入時間已過期!');
        }
        return $next($request);
    }
}
