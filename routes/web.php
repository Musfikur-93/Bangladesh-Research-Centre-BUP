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


Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//Frontend Routes
Route::group(['namespace' => 'App\Http\Controllers\Front'], function(){
    Route::get('/','IndexController@index');

    //about (only for category route name er jonno)
    Route::get('/about/front','IndexController@aboutft')->name('about');
    //bsmc route
    Route::get('/about/bsmc','IndexController@aboutbsmc')->name('bsmc');
    //message route
    Route::get('/about/message','IndexController@aboutmessage')->name('message');

    //office (only for category route name er jonno)
    Route::get('/office/front','IndexController@officeft')->name('office');
    //employee route
    Route::get('/office/employee','IndexController@employee')->name('employee');
    //employee details route
    Route::get('/office/employee-details/{slug}','IndexController@details')->name('employee.details');
    //member route
    Route::get('/office/member','IndexController@member')->name('committees');
    //publication route
    Route::get('/front/publication','IndexController@publication')->name('publication');
    //publication details route
    Route::get('/front/publication-view/{publication_slug}','IndexController@publicationview')->name('publication.details');
    //artical route
    Route::get('/front/artical/{publication_slug}','IndexController@articalview')->name('publication.artical');
    //researchers route
    Route::get('/front/researchers','IndexController@researchers')->name('researchers');
    //all researchers route
    Route::get('/front/researchers/all','IndexController@professor')->name('all-researcher');
    Route::get('/front/researchers/researcher-details/{slug}','IndexController@resdetail')->name('researcher.details');
    //honor board route
    Route::get('/front/honor-member','IndexController@honormember')->name('honor-member');
    //notice route
    Route::get('/front/all-notice','IndexController@allnotice')->name('notice');
    //event route
    Route::get('/front/event-news','IndexController@eventnews')->name('events-and-news');
    //event details route
    Route::get('/front/event-news/details/{e_title}','IndexController@eventnewsdetail')->name('event.details');
    //archive route
    Route::get('/front/archive','IndexController@allarchive')->name('archive');
    //gallery route
    Route::get('/front/gallery','IndexController@gallery')->name('gallery');
    //video gallery route
    Route::get('/front/gallery/video','IndexController@allvideo')->name('video');
    //photo gallery route
    Route::get('/front/gallery/photo','IndexController@allphoto')->name('photo');
    //photo view route
    Route::get('/front/gallery/photo/{slug}','IndexController@photoview')->name('photo.all');
    //custom page route
    Route::get('/front/page/{page_slug}','IndexController@pageview')->name('page.view');
    //newsletter route
    Route::post('/front/newsletter','IndexController@newsletterstore')->name('newsletter.store');

    
});