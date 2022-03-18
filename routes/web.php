<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//登入路徑
Route::match(array('GET'),   '/login',          ['uses'=>'LoginController@Login']);
Route::match(array('POST'),   '/login',         ['uses'=>'LoginController@LoginAction']);
Route::match(array('GET'),   '/loginout',       ['uses'=>'LoginController@Loginout']);
Route::match(array('GET'),   '/register',       ['uses'=>'LoginController@register_show']);
Route::match(array('POST'),   '/register',      ['uses'=>'LoginController@register']);

//後端路徑
Route::prefix('admin')->middleware('LoginMiddleware')->group(function(){

    Route::match(array('GET'),   '/Home',                           ['uses'=>'HomeController@Home']); 
    Route::match(array('GET'),   '/HomeAdd',                        ['uses'=>'HomeController@HomeAdd']); 
    Route::match(array('POST'),  '/HomeAdd',                        ['uses'=>'HomeController@HomeAddAction']); 
    Route::match(array('GET'),   '/HomeEdit/{ca_id}',               ['uses'=>'HomeController@HomeEdit']); 
    Route::match(array('POST'),  '/HomeEdit',                       ['uses'=>'HomeController@HomeEditAction']); 
    Route::match(array('GET'),   '/HomeDeleteAction/{ca_id}',       ['uses'=>'HomeController@HomeDeleteAction']);
    Route::match(array('GET'),   '/checkorder',                     ['uses'=>'HomeController@call_checkorder']); //判斷輪播順序是否重複

    Route::match(array('GET'),   '/New',                            ['uses'=>'NewController@New']); 
    Route::match(array('GET'),   '/NewAdd',                         ['uses'=>'NewController@NewAdd']); 
    Route::match(array('POST'),  '/NewAdd',                         ['uses'=>'NewController@NewAddAction']); 
    Route::match(array('GET'),   '/NewEdit/{n_id}',                 ['uses'=>'NewController@NewEdit']); 
    Route::match(array('POST'),  '/NewEdit',                        ['uses'=>'NewController@NewEditAction']); 
    Route::match(array('GET'),   '/NewDeleteAction/{n_id}',         ['uses'=>'NewController@NewDeleteAction']);

    Route::match(array('GET'),   '/Artist',                         ['uses'=>'ArtistController@Artist']); 
    Route::match(array('GET'),   '/ArtistAdd',                      ['uses'=>'ArtistController@ArtistAdd']); 
    Route::match(array('POST'),  '/ArtistAdd',                      ['uses'=>'ArtistController@ArtistAddAction']); 
    Route::match(array('GET'),   '/ArtistEdit/{a_id}',              ['uses'=>'ArtistController@ArtistEdit']); 
    Route::match(array('POST'),  '/ArtistEdit',                     ['uses'=>'ArtistController@ArtistEditAction']); 
    Route::match(array('GET'),   '/ArtistDeleteAction/{a_id}',      ['uses'=>'ArtistController@ArtistDeleteAction']);

    Route::match(array('GET'),   '/Exhibition',                     ['uses'=>'ExhibitionConhtroller@Exhibition']); 
    Route::match(array('GET'),   '/ExhibitionAdd',                  ['uses'=>'ExhibitionConhtroller@ExhibitionAdd']); 
    Route::match(array('POST'),  '/ExhibitionAdd',                  ['uses'=>'ExhibitionConhtroller@ExhibitionAddAction']); 
    Route::match(array('GET'),   '/ExhibitionEdit/{e_id}',          ['uses'=>'ExhibitionConhtroller@ExhibitionEdit']); 
    Route::match(array('POST'),  '/ExhibitionEdit',                 ['uses'=>'ExhibitionConhtroller@ExhibitionEditAction']); 
    Route::match(array('GET'),   '/ExhibitionDeleteAction/{e_id}',  ['uses'=>'ExhibitionConhtroller@ExhibitionDeleteAction']);

    Route::match(array('GET'),   '/Year',                           ['uses'=>'ExhibitionYearController@Year']); 
    Route::match(array('GET'),   '/YearAdd',                        ['uses'=>'ExhibitionYearController@YearAdd']); 
    Route::match(array('POST'),  '/YearAdd',                        ['uses'=>'ExhibitionYearController@YearAddAction']); 
    Route::match(array('GET'),   '/YearEdit/{y_id}',                ['uses'=>'ExhibitionYearController@YearEdit']); 
    Route::match(array('POST'),  '/YearEdit',                       ['uses'=>'ExhibitionYearController@YearEditAction']); 
    Route::match(array('GET'),   '/YearDeleteAction/{y_id}',        ['uses'=>'ExhibitionYearController@YearDeleteAction']);

    Route::match(array('GET'),   '/About/{a_id}',                   ['uses'=>'AboutController@About']);
    Route::match(array('POST'),  '/About/',                         ['uses'=>'AboutController@AboutAction']); 
});



//前端路徑
Route::prefix('web')->group(function () {
    Route::get('/Home', function () {return view('client/home'); });
    Route::get('/News', function () {return view('client/new'); });
    Route::get('/Exhibition/{YEAR_NUMBER?}', function ($YEAR_NUMBER=1) {return view('client/exhibition'); });
    Route::get('/Artist', function () {return view('client/artist'); });
    Route::get('/Artist_CONTENT/{Artist_ID?}', function ($ARTIST_ID=1) {return view('client/artist_content'); });
    Route::get('/About', function () {return view('client/about'); });
});
