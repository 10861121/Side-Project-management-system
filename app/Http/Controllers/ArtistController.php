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

class ArtistController extends Controller
{
   public function Artist()
   {
      
      $DBartist=DB::table('artist')
            ->get();

      return view('artist.artist',array('DBartist'=>$DBartist));
   }
   public function ArtistAdd()
   {
      return View('artist.artistAdd');
   }
   public function ArtistAddAction(Request $Input)
   {  
      // dd($Input->all());
      $name= $Input['name'];
      $ename= $Input['ename'];
      $content= $Input['content'];

      if ($Input->hasFile('image'))//判斷是否上傳檔案及順序是否重複
      {

         $file = $Input->file('image');
         $originalFileExtension = $Input->file('image')->getClientOriginalExtension();

         $changeFilePath = public_path("image/artist");
         $changeFileName = $name.date("Y-m-d-s",time()).'.'.$originalFileExtension;
         $Input->file('image')->move($changeFilePath,$changeFileName);
         // dd($changeFilePath.'/'.$changeFileName);
      
         $DBCarousel = DB::table('artist')
         ->insert([
            'ARTIST_NAME'=>     $name,
            'ARTIST_ENNAME'=>   $ename,
            'ARTIST_CONTENT'=>  $content,
            'ARTIST_IMGURL'=>   $changeFileName,
         ]);
         return Redirect::action('ArtistController@Artist');  
      }
      else
      {
         return Redirect::back()->withErrors(['未選圖片']);
      }
      

   }
   public function ArtistEdit($a_id)
   {

      $DBartist=DB::table('artist')
         ->where('ARTIST_ID',$a_id)
         ->first();
      // dd($DBnew);

      return view('artist.artistEdit',array('DBartist'=>$DBartist));
   }
   public function ArtistEditAction(Request $Input)
   {

      $a_id = $Input['id'];
      $name= $Input['name'];
      $ename= $Input['ename'];
      $content= $Input['content'];
      $FilePath = public_path("image/artist");
      $DBartist=DB::table('artist')
         ->where('ARTIST_ID',$a_id)
         ->first();
      if ($Input->hasFile('image'))//判斷是否上傳檔案
      {
         $originalFileExtension = $Input->file('image')->getClientOriginalExtension();
         $changeFileName = $name.'-'.date("Y-m-d-s",time()).'.'.$originalFileExtension;
         
         unlink($FilePath.'/'.$DBartist->ARTIST_IMGURL);
         $Input->file('image')->move($FilePath,$changeFileName);
         $up=DB::table('artist')
                ->where('ARTIST_ID',$a_id)
                ->update([
					'ARTIST_NAME'=>     $name,
					'ARTIST_ENNAME'=>   $ename,
					'ARTIST_CONTENT'=>  $content,
					'ARTIST_IMGURL'=>     $changeFileName,
                ]);
         return Redirect::action('ArtistController@Artist');  

      }
      else
      {

         $up=DB::table('artist')
                ->where('ARTIST_ID',$a_id)
                ->update([
                  'ARTIST_NAME'=>     $name,
   					'ARTIST_ENNAME'=>   $ename,
   					'ARTIST_CONTENT'=>  $content,
                ]);
         return Redirect::action('ArtistController@Artist');  

      }


      // dd($Input->all());
   }
   public function ArtistDeleteAction($a_id)
   {
      $FilePath = public_path("image/artist");
      $DBartist=DB::table('artist')
         ->where('ARTIST_ID',$a_id)
         ->first();
      unlink($FilePath.'/'.$DBartist->ARTIST_IMGURL);

      $delete_artist=DB::table('artist')
            ->where('ARTIST_ID',$a_id)
            ->delete();

      return Redirect::action('ArtistController@Artist');  

   }
}
