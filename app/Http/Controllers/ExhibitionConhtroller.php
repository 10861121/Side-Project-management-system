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

class ExhibitionConhtroller extends Controller
{
   public function Exhibition()
   {
      
      $DBexhibition=DB::table('exhibition')
      		->join('exhibition_year','exhibition.EXHIBITION_YEAR_ID','=','exhibition_year.EXHIBITION_YEAR_ID')
            ->get();
      // dd($DBexhibition);
      return view('exhibition.exhibition',array('DBexhibition'=>$DBexhibition));
   }
   public function ExhibitionAdd()
   {
      $exhibition_year=DB::table('exhibition_year')
            ->get();

      return View('exhibition.exhibitionAdd',array('exhibition_year'=>$exhibition_year));
   }
   public function ExhibitionAddAction(Request $Input)
   {  
      // dd($Input->all());
      $title= $Input['title'];
      $t1= $Input['t1'];
      $year= $Input['year'];

      if ($Input->hasFile('image'))//判斷是否上傳檔案及順序是否重複
      {

         $file = $Input->file('image');
         $originalFileExtension = $Input->file('image')->getClientOriginalExtension();

         $changeFilePath = public_path("image/exhibition");
         $changeFileName = $title.date("Y-m-d-s",time()).'.'.$originalFileExtension;
         $Input->file('image')->move($changeFilePath,$changeFileName);
         // dd($changeFilePath.'/'.$changeFileName);
      
         $DBCarousel = DB::table('exhibition')
         ->insert([
            'EXHIBITION_TITLE'=>    $title,
            'EXHIBITION_T1'=>      	$t1,
            'EXHIBITION_YEAR_ID'=>  $year,
            'EXHIBITION_IMGURL'=>   $changeFileName,
         ]);
         return Redirect::action('ExhibitionConhtroller@Exhibition');  
      }
      else
      {
         return Redirect::back()->withErrors(['未選圖片']);
      }
      

   }
   public function ExhibitionEdit($e_id)
   {

      $DBexhibition=DB::table('exhibition')
      	->join('exhibition_year','exhibition.EXHIBITION_YEAR_ID','=','exhibition_year.EXHIBITION_YEAR_ID')
        ->where('EXHIBITION_ID',$e_id)
        ->first();
      $DBexhibition_year=DB::table('exhibition_year')
        ->get();
      // dd($DBexhibition_year);

      return view('exhibition.exhibitionEdit',array('DBexhibition'=>$DBexhibition,'DBexhibition_year'=>$DBexhibition_year));
   }
   public function ExhibitionEditAction(Request $Input)
   {
   	  $e_id = $Input['id'];
      $title= $Input['title'];
      $t1= $Input['t1'];
      $year= $Input['year'];

      $FilePath = public_path("image/exhibition");
      $DBnew=DB::table('exhibition')
         ->where('EXHIBITION_ID',$e_id)
         ->first();
      if ($Input->hasFile('image'))//判斷是否上傳檔案
      {
         $originalFileExtension = $Input->file('image')->getClientOriginalExtension();
         $changeFileName = $title.'-'.date("Y-m-d-s",time()).'.'.$originalFileExtension;
         
         unlink($FilePath.'/'.$DBnew->EXHIBITION_IMGURL);
         $Input->file('image')->move($FilePath,$changeFileName);
         $up=DB::table('exhibition')
                ->where('EXHIBITION_ID',$e_id)
                ->update([
					'EXHIBITION_TITLE'=>    $title,
					'EXHIBITION_T1'=>      	$t1,
					'EXHIBITION_YEAR_ID'=>  $year,
					'EXHIBITION_IMGURL'=>   $changeFileName,
                ]);
         return Redirect::action('ExhibitionConhtroller@Exhibition');  

      }
      else
      {

         $up=DB::table('exhibition')
                ->where('EXHIBITION_ID',$e_id)
                ->update([
                    'EXHIBITION_TITLE'=>    $title,
					'EXHIBITION_T1'=>      	$t1,
					'EXHIBITION_YEAR_ID'=>  $year,
                ]);
         return Redirect::action('ExhibitionConhtroller@Exhibition');  

      }


      // dd($Input->all());
   }
   public function ExhibitionDeleteAction($e_id)
   {
      $FilePath = public_path("image/exhibition");
      $DBnews=DB::table('exhibition')
         ->where('EXHIBITION_ID',$e_id)
         ->first();
      unlink($FilePath.'/'.$DBnews->EXHIBITION_IMGURL);

      $delete_news=DB::table('exhibition')
            ->where('EXHIBITION_ID',$e_id)
            ->delete();

      return Redirect::action('ExhibitionConhtroller@Exhibition');  

   }
}
