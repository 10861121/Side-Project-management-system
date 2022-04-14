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

class ExhibitionYearController extends Controller
{
    public function Year()
   {
      
      $DByear=DB::table('exhibition_year')
            ->get();

      return view('year.year',array('DByear'=>$DByear));
   }
   public function YearAdd()
   {
      return View('year.yearAdd');
   }
   public function YearAddAction(Request $Input)
   {  
        $year= $Input['year'];

        $DByear = DB::table('exhibition_year')
        ->insert([
        'EXHIBITION_YEAR'=> $year,
        ]);
        return Redirect::action('ExhibitionYearController@Year');  
      
   }
   public function YearEdit($y_id)
   {

      $DByear=DB::table('exhibition_year')
         ->where('EXHIBITION_YEAR_ID',$y_id)
         ->first();
      // dd($DBnew);

      return view('year.yearEdit',array('DByear'=>$DByear));
   }
   public function YearEditAction(Request $Input)
   {

        $y_id = $Input['id'];
        $year= $Input['year'];

        $up=DB::table('exhibition_year')
        ->where('EXHIBITION_YEAR_ID',$y_id)
        ->update([
        'EXHIBITION_YEAR'=>  $year,
        ]);
        return Redirect::action('ExhibitionYearController@Year');  

   }
   public function YearDeleteAction($y_id)
   {
      $delete_news=DB::table('exhibition_year')
            ->where('EXHIBITION_YEAR_ID',$y_id)
            ->delete();

      return Redirect::action('ExhibitionYearController@Year');  

   }
}
