<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Redirect;
use Session;
use store;
use Storage;
use move;
use unlink;

class NewController extends Controller
{
   function LinePush($test)
    {
        $httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient('DCD4xORoKGxfnLGuzWVCMOKSgeuRNBXysUaISnipcNXJESVu4MTZ3HC26C915KkYU2LYCjgwAGITO505/31jwNFdqYYBXShJh/W2V0BRlnHnL0A4doJtjeA/J0ufEpwEjhe4wNGMFYwm0J/8u8k+aAdB04t89/1O/w1cDnyilFU=');
        $bot = new \LINE\LINEBot($httpClient, ['channelSecret' => '<channel f2a6925cd9e26f385d5799201ca6ad86>']);

        $textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder($test);
        $response = $bot->pushMessage('U454db464af7f0da84b8e029d95cdf4e3', $textMessageBuilder);
    }

   public function New()
   {
      
      $DBnew=DB::table('news')
            ->get();

      return view('new.new',array('DBnew'=>$DBnew));
   }
   public function NewAdd()
   {
      return View('new.newAdd');
   }
   public function NewAddAction(Request $Input)
   {  
      // dd($Input->all());
      $title= $Input['title'];
      $t1= $Input['t1'];
      $t2= $Input['t2'];
      $content= $Input['content'];

      if ($Input->hasFile('image'))//判斷是否上傳檔案及順序是否重複
      {

         $file = $Input->file('image');
         $originalFileExtension = $Input->file('image')->getClientOriginalExtension();

         $changeFilePath = public_path("image/new");
         $changeFileName = $title.date("Y-m-d-s",time()).'.'.$originalFileExtension;
         $Input->file('image')->move($changeFilePath,$changeFileName);
         // dd($changeFilePath.'/'.$changeFileName);
      
         $DBCarousel = DB::table('news')
         ->insert([
            'NEWS_T1'=>         $t1,
            'NEWS_TITLE'=>      $title,
            'NEWS_T2'=>         $t2,
            'NEWS_CONTENT'=>    $content,
            'NEWS_IMGURL'=>     $changeFileName,
         ]);
         $this->LinePush("蒼芎畫廊新增訊息");
         $this->LinePush("訊息標題：".$title);
         return Redirect::action('NewController@New');  
      }
      else
      {
         return Redirect::back()->withErrors(['未選圖片']);
      }
      

   }
   public function NewEdit($n_id)
   {

      $DBnew=DB::table('news')
         ->where('NEWS_ID',$n_id)
         ->first();
      // dd($DBnew);

      return view('new.newEdit',array('DBnew'=>$DBnew));
   }
   public function NewEditAction(Request $Input)
   {

      $n_id = $Input['id'];
      $title= $Input['title'];
      $t1= $Input['t1'];
      $t2= $Input['t2'];
      $content= $Input['content'];
      $FilePath = public_path("image/new");
      $DBnew=DB::table('news')
         ->where('NEWS_ID',$n_id)
         ->first();
      if ($Input->hasFile('image'))//判斷是否上傳檔案
      {
         $originalFileExtension = $Input->file('image')->getClientOriginalExtension();
         $changeFileName = $title.'-'.date("Y-m-d-s",time()).'.'.$originalFileExtension;
         
         unlink($FilePath.'/'.$DBnew->NEWS_IMGURL);
         $Input->file('image')->move($FilePath,$changeFileName);
         $up=DB::table('news')
                ->where('NEWS_ID',$n_id)
                ->update([
                     'NEWS_T1'=>         $t1,
                     'NEWS_TITLE'=>      $title,
                     'NEWS_T2'=>         $t2,
                     'NEWS_CONTENT'=>    $content,
                     'NEWS_IMGURL'=>     $changeFileName,
                ]);
         return Redirect::action('NewController@New');  

      }
      else
      {

         $up=DB::table('news')
                ->where('NEWS_ID',$n_id)
                ->update([
                     'NEWS_T1'=>         $t1,
                     'NEWS_TITLE'=>      $title,
                     'NEWS_T2'=>         $t2,
                     'NEWS_CONTENT'=>    $content,
                ]);
         return Redirect::action('NewController@New');  

      }


      // dd($Input->all());
   }
   public function NewDeleteAction($n_id)
   {
      $FilePath = public_path("image/new");
      $DBnews=DB::table('news')
         ->where('NEWS_ID',$n_id)
         ->first();
      unlink($FilePath.'/'.$DBnews->NEWS_IMGURL);

      $delete_news=DB::table('news')
            ->where('NEWS_ID',$n_id)
            ->delete();

      return Redirect::action('NewController@New');  

   }
}
