<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*
 * Default Route
 *
 * @return (pages.home)
 */
Route::get('/', function(){
	return view('pages.home');
});

/*
 * About Route
 *
 * @return (pages.about)
 */
Route::get('about', function(){
	return view('pages.about');
});

 /*
 * display single post
 */
Route::get('/{slug}',['as' => 'post', 'uses' => 'PostController@show'])->where('slug', '[A-Za-z0-9-_]+');
