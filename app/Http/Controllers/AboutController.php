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


class AboutController extends Controller
{
    public function About($a_id)
   {

      $DBabout=DB::table('about')
         ->where('ABOUT_ID',$a_id)
         ->first();
      // dd($DBnew);

      return view('about.about',array('DBabout'=>$DBabout));
   }
    public function AboutAction(Request $Input)
    {
      $a_id = $Input['id'];
      $content= $Input['content'];
      $FilePath = public_path("image/about");
      $DBabout=DB::table('about')
         ->where('ABOUT_ID',$a_id)
         ->first();
      if ($Input->hasFile('image'))//判斷是否上傳檔案
      {
         $originalFileExtension = $Input->file('image')->getClientOriginalExtension();
         $changeFileName = date("Y-m-d-s",time()).'.'.$originalFileExtension;
         
         unlink($FilePath.'/'.$DBabout->ABOUT_IMGURL);
         $Input->file('image')->move($FilePath,$changeFileName);
         $up=DB::table('about')
                ->where('ABOUT_ID',$a_id)
                ->update([
                    'ABOUT_CONTENT'=>    $content,
                    'ABOUT_IMGURL'=>     $changeFileName,
                ]);
         return Redirect::action('AboutController@About','1');  

      }
      else
      {

         $up=DB::table('about')
                ->where('ABOUT_ID',$a_id)
                ->update([
                  'ABOUT_CONTENT'=>    $content,
                ]);
         return Redirect::action('AboutController@About','1');  

      }

   }
}
