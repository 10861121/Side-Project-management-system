<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Redirect;
use Session;

class LoginController extends Controller
{
    public function Login()
    {
        return View('login.login');
    }

    public function LoginAction(Request $Input)
    {

        $account=           $Input['account'];
        $password=          $Input['password'];


        $DBusers=DB::table('users')
            ->where('account',$account)
            ->where('password',$password)
            ->first();
        if(isset($DBusers)==false)
        {
            return Redirect::back()->withErrors(['帳號或密碼輸入錯誤']);
        }
        else
        {
            $DBusers_session=DB::table('user_session')
                ->insert([
                    'session_id'=>      Session::getId(),
                    'u_id'=>            $DBusers->id,
                    'created'=>         time(),
                 ]);
            return Redirect::action('HomeController@Home');
        }
        
    }

    public function register_show()
    {

    }
    public function register()
    {

    }
     public function Loginout()
    {
        $del=DB::table('user_session')
            ->where('session_id',Session::getId())
            ->delete();
        Session::flush();

        if($del==true)
        {
            return Redirect::action('LoginController@Login')->withErrors(['登出成功']);
        }
        return View('login.login');
    }
}
