<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Redirect;
use Session;

class LoginController extends Controller
{
    function LinePush($test)
    {
        $httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient('DCD4xORoKGxfnLGuzWVCMOKSgeuRNBXysUaISnipcNXJESVu4MTZ3HC26C915KkYU2LYCjgwAGITO505/31jwNFdqYYBXShJh/W2V0BRlnHnL0A4doJtjeA/J0ufEpwEjhe4wNGMFYwm0J/8u8k+aAdB04t89/1O/w1cDnyilFU=');
        $bot = new \LINE\LINEBot($httpClient, ['channelSecret' => '<channel f2a6925cd9e26f385d5799201ca6ad86>']);

        $textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder($test);
        $response = $bot->pushMessage('U454db464af7f0da84b8e029d95cdf4e3', $textMessageBuilder);
    }

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
            $this->LinePush("有人試圖登入".$account);
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
            $this->LinePush($account."已被登入");
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
