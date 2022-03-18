<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class ClientController extends Controller
{
    public function HomeList()
    {
        $DBnews=DB::table('news')
            ->orderBy('NEWS_ID', 'desc')
            ->limit(3)
            ->get();

        $number=0;
        foreach($DBnews as $value){

            $NEWS_TITLE[$number]=       $value->NEWS_TITLE;
            $NEWS_IMGURL[$number]=      url('image/new').'/'.$value->NEWS_IMGURL;
            $number++;

        }


        $DBexhibition=DB::table('exhibition')
            ->orderBy('EXHIBITION_ID', 'desc')
            ->limit(3)
            ->get();

        $number=0;
        foreach($DBexhibition as $value){

            $EXHIBITION_TITLE[$number]=       $value->EXHIBITION_TITLE;
            $EXHIBITION_IMGURL[$number]=      url('image/exhibition').'/'.$value->EXHIBITION_IMGURL;
            $number++;
        }
        
        $DBartist=DB::table('artist')
            ->orderBy('ARTIST_ID', 'desc')
            ->limit(3)
            ->get();

        $number=0;
        foreach($DBartist as $value){

            $ARTIST_NAME[$number]=        $value->ARTIST_NAME;
            $ARTIST_IMGURL[$number]=      url('image/artist').'/'.$value->ARTIST_IMGURL;
            $number++;
        }

        $DBcarousel=DB::table('carousel')
            ->orderBy('ca_order', 'ASC')
            ->where('ca_switch','1')
            ->get();

        $number=0;
        foreach($DBcarousel as $value){

            $ca_file[$number]=        url('image/carousel').'/'.$value->ca_file;
            $ca_order[$number]=       $value->ca_order;
            $number++;
        }

        $json = [

            'NEWS_TITLE' =>               $NEWS_TITLE,
            'NEWS_IMGURL' =>              $NEWS_IMGURL,
            'EXHIBITION_TITLE'  =>        $EXHIBITION_TITLE,
            'EXHIBITION_IMGURL' =>        $EXHIBITION_IMGURL,
            'ARTIST_NAME'=>               $ARTIST_NAME,
            'ARTIST_IMGURL'=>             $ARTIST_IMGURL,
            'ca_file'=>                   $ca_file,
            'ca_order'=>                  $ca_order,

        ];

        return json_encode($json,JSON_UNESCAPED_UNICODE);
    }

    //藝術家
    public function Artistlist()
    {
        $DBartist=DB::table('artist')
            ->get();
        
         $number=0;
        foreach($DBartist as $value){

            $ARTIST_ID[$number]=          $value->ARTIST_ID;
            $ARTIST_NAME[$number]=        $value->ARTIST_NAME;
            $ARTIST_ENNAME[$number]=      $value->ARTIST_ENNAME;
            $ARTIST_CONTENT[$number]=     $value->ARTIST_CONTENT;
            $ARTIST_IMGURL[$number]=      url('image/artist').'/'.$value->ARTIST_IMGURL;

            $number++;

        }
        $json = [

            'ARTIST_ID' =>                $ARTIST_ID,
            'ARTIST_NAME' =>              $ARTIST_NAME,
            'ARTIST_ENNAME'  =>           $ARTIST_ENNAME,
            'ARTIST_CONTENT' =>           $ARTIST_CONTENT,
            'ARTIST_IMGURL'=>             $ARTIST_IMGURL,
        ];

        return json_encode($json,JSON_UNESCAPED_UNICODE);
    }
    
    public function ArtistContent(Request $ARTIST_ID)
    {
        $searchdata = $ARTIST_ID['ARTIST_ID'];

        $DBartist=DB::table('artist')
            ->where('ARTIST_ID',$searchdata)
            ->first();
        // dd($DBartist->ARTIST_ID);


        $ARTIST_ID=          $DBartist->ARTIST_ID;
        $ARTIST_NAME=        $DBartist->ARTIST_NAME;
        $ARTIST_ENNAME=      $DBartist->ARTIST_ENNAME;
        $ARTIST_CONTENT=     $DBartist->ARTIST_CONTENT;
        $ARTIST_IMGURL=      url('image/artist').'/'.$value->ARTIST_IMGURL;

        $json = [

            'ARTIST_ID' =>                $ARTIST_ID,
            'ARTIST_NAME' =>              $ARTIST_NAME,
            'ARTIST_ENNAME'  =>           $ARTIST_ENNAME,
            'ARTIST_CONTENT' =>           $ARTIST_CONTENT,
            'ARTIST_IMGURL'=>             $ARTIST_IMGURL,
        ];

        return json_encode($json,JSON_UNESCAPED_UNICODE);
    }

    //展覽
    public function Exhibitionlist(Request $YEAR_NUMBER)
    {
    // dd($YEAR_NUMBER['YEAR_NUMBER']);
        $searchdata = $YEAR_NUMBER['YEAR_NUMBER'];
        // dd($searchdata);
        $DBexhibition=DB::table('exhibition')
            ->where('EXHIBITION_YEAR_ID',$searchdata)
            ->get();

        $DBexhibition_year=DB::table('exhibition_year')
            ->get();

        $number = 0;
        // $EXHIBITION_ID=[];
        foreach($DBexhibition as $value){

            $EXHIBITION_ID[$number]=          $value->EXHIBITION_ID;
            $EXHIBITION_TITLE[$number]=       $value->EXHIBITION_TITLE;
            $EXHIBITION_T1[$number]=          $value->EXHIBITION_T1;
            $EXHIBITION_IMGURL[$number]=      url('image/exhibition').'/'.$value->EXHIBITION_IMGURL;
            $EXHIBITION_YEAR_ID[$number]=     $value->EXHIBITION_YEAR_ID;
            $number++;
        }
        $number = 0;
        foreach($DBexhibition_year as $value){

            $YEAR_ID[$number]=       $value->EXHIBITION_YEAR_ID;
            $YEAR[$number]=          $value->EXHIBITION_YEAR;
            $number++;
        }
        $json = [

            'EXHIBITION_ID' =>                $EXHIBITION_ID,
            'EXHIBITION_TITLE' =>             $EXHIBITION_TITLE,
            'EXHIBITION_T1'  =>               $EXHIBITION_T1,
            'EXHIBITION_IMGURL' =>            $EXHIBITION_IMGURL,
            'EXHIBITION_YEAR_ID'=>            $EXHIBITION_YEAR_ID,

            'YEAR_ID' =>                      $YEAR_ID,
            'YEAR'=>                          $YEAR,

        ];  
        // dd($json);
        return json_encode($json,JSON_UNESCAPED_UNICODE);
    }

     //訊息
    public function Newlist()
    {
        $DBnews=DB::table('news')
                ->get();
        // print $DBnews;
        // return view("client.new",array('DBnews'=>$DBnews));
        $number=0;

        foreach($DBnews as $value){
            $NEWS_ID[$number]=          $value->NEWS_ID;
            $NEWS_T1[$number]=          $value->NEWS_T1;
            $NEWS_TITLE[$number]=       $value->NEWS_TITLE;
            $NEWS_T2[$number]=          $value->NEWS_T2;
            $NEWS_CONTENT[$number]=     $value->NEWS_CONTENT;
            $NEWS_IMGURL[$number]=      url('image/new').'/'.$value->NEWS_IMGURL;
            $number++;

        }
        $json = [

            'NEWS_ID' =>                $NEWS_ID,
            'NEWS_T1' =>                $NEWS_T1,
            'NEWS_TITLE'  =>            $NEWS_TITLE,
            'NEWS_T2' =>                $NEWS_T2,
            'NEWS_CONTENT'=>            $NEWS_CONTENT,
            'NEWS_IMGURL'  =>           $NEWS_IMGURL,

        ];


        return json_encode($json,JSON_UNESCAPED_UNICODE);
    }
    public function AboutList()
    {
        $DBabout=DB::table('about')
            ->first();

        
        $ABOUT_ID=          $DBabout->ABOUT_ID;
        $ABOUT_CONTENT=     $DBabout->ABOUT_CONTENT;
        $ABOUT_IMGURL=      url('image/about').'/'.$DBabout->ABOUT_IMGURL;
        $json = [

            'ABOUT_ID' =>                $ABOUT_ID,
            'ABOUT_CONTENT' =>           $ABOUT_CONTENT,
            'ABOUT_IMGURL'  =>           $ABOUT_IMGURL,
        ];
        // dd($json);
        return json_encode($json,JSON_UNESCAPED_UNICODE);
    }
}
