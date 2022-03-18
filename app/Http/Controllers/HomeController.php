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

class HomeController extends Controller
{
   public function Home()
   {
      
      $DBcarousel=DB::table('carousel')
            ->get();

      return view('Home.home',array('DBcarousel'=>$DBcarousel));
   }
   public function HomeAdd()
   {
      return View('Home.homeAdd');
   }
   public function HomeAddAction(Request $Input)
   {
      $title= $Input['title'];
      $order= $Input['order'];
      $checkorder = $this->checkorder($order);

      if ($Input->hasFile('image'))//判斷是否上傳檔案及順序是否重複
      {
         if($checkorder==false) {return Redirect::back()->withErrors(['圖片順序重複']);}

         $file = $Input->file('image');
         $originalFileExtension = $Input->file('image')->getClientOriginalExtension();

         $changeFilePath = public_path("image/carousel");
         $changeFileName = $title.date("Y-m-d-s",time()).'.'.$originalFileExtension;
         $Input->file('image')->move($changeFilePath,$changeFileName);
         // dd($changeFilePath.'/'.$changeFileName);
      
         $DBCarousel = DB::table('carousel')
         ->insert([
            'ca_file'=>       $changeFileName,
            'ca_title'=>      $title,
            'ca_order'=>      $order,
         ]);
         return Redirect::action('HomeController@Home');  
      }
      else
      {
         return Redirect::back()->withErrors(['未選圖片']);
      }
      

   }
   public function HomeEdit($ca_id)
   {

      $DBcarousel=DB::table('carousel')
         ->where('ca_id',$ca_id)
         ->first();
      // dd($ca_id);

      return view('Home.homeEdit',array('DBcarousel'=>$DBcarousel));
   }
   public function HomeEditAction(Request $Input)
   {

      $ca_id = $Input['id'];
      $ca_title = $Input['title'];
      $ca_order = $Input['order'];
      $ca_switch = $Input['switch'];
      $FilePath = public_path("image/carousel");
      $DBcarousel=DB::table('carousel')
         ->where('ca_id',$ca_id)
         ->first();
      // dd($DBcarousel->ca_order,$ca_order);
      $checkorder = $this->check_myself_order($ca_order,$ca_id);
      if ($Input->hasFile('image'))//判斷是否上傳檔案
      {
         if($checkorder==false) {return Redirect::back()->withErrors(['圖片順序重複']);}

         $DBcarousel_order=DB::table('carousel')
            ->where('ca_order',$ca_order)
            ->first();
         $originalFileExtension = $Input->file('image')->getClientOriginalExtension();
         $changeFileName = $ca_title.date("Y-m-d-s",time()).'.'.$originalFileExtension;
         
         unlink($FilePath.'/'.$DBcarousel->ca_file);
         $Input->file('image')->move($FilePath,$changeFileName);
         $up=DB::table('carousel')
                ->where('ca_id',$ca_id)
                ->update([
                    'ca_title'=>    $ca_title,
                    'ca_order'=>    $ca_order,
                    'ca_switch'=>   $ca_switch,
                    'ca_file'=>     $changeFileName,
                ]);
         return Redirect::action('HomeController@Home');  

      }
      else
      {
         if($checkorder==false) {return Redirect::back()->withErrors(['圖片順序重複']);}

         $up=DB::table('carousel')
                ->where('ca_id',$ca_id)
                ->update([
                    'ca_title'=>    $ca_title,
                    'ca_order'=>    $ca_order,
                    'ca_switch'=>   $ca_switch,
                ]);
         return Redirect::action('HomeController@Home');  

      }


      // dd($Input->all());
   }
   public function HomeDeleteAction($ca_id)
   {
      $FilePath = public_path("image/carousel");
      $DBcarousel=DB::table('carousel')
         ->where('ca_id',$ca_id)
         ->first();
      unlink($FilePath.'/'.$DBcarousel->ca_file);

      $delete_carousel=DB::table('carousel')
            ->where('ca_id',$ca_id)
            ->delete();

      return Redirect::action('HomeController@Home');  

   }

   function checkorder($ca_order)
   {
      $DBcarousel=DB::table('carousel')
         ->where('ca_order',$ca_order)
         ->first();

      if(isset($DBcarousel)==false)
        {
            return true;//蒐尋不到資料  代表蒐尋不到重複的順序 可以使用
        }
        else
        {
            return false;//搜尋到資料 代表蒐尋到重複的順序  不可以使用
        }
   }
   function check_myself_order($ca_order,$ca_id)
   {
       $DBcarousel=DB::table('carousel')
         ->where('ca_order',$ca_order)
         ->first();

      if(isset($DBcarousel)==false)
        {
            return true;//蒐尋不到資料  代表蒐尋不到重複的順序 可以使用
        }
        else
        {
            $check_myself_order=DB::table('carousel')
            ->where('ca_id',$ca_id)
            ->where('ca_order',$ca_order)
            ->first();
            if(isset($check_myself_order)==false)
            {
               return false;//蒐尋不到資料 代表蒐尋的到順序不是本身 無法進行修改
            }
            else
            {
               return true;//搜尋到資料    代表蒐尋到的順序是自己 可以進行修改
            }
        }

   }
   public function call_checkorder(Request $Input)//onclick使用
   {
      $order = $Input["order"];

      $callfunction_check = $this->checkorder($order);
      if($callfunction_check==false)
      {
         $json = ['message' => '請重新輸入'];    
         return json_encode($json,JSON_UNESCAPED_UNICODE);
      }
      else
      {
         $json = ['message' => '可以使用'];   
         return json_encode($json,JSON_UNESCAPED_UNICODE);
      }

      // dd($order);
   }
}
