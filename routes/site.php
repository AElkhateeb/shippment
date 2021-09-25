<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Url;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|Route::get('/', function () {
    return view('welcome');
});
URL::defaults(['locale' => app('')]);
Route::get('/', function () {
    return Redirect::to(Config::get('app.default_language'));

});
و
*/
Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ],
    'namespace'=>'App\Http\Controllers\Site'
    ],function () {
        Route::get('/', 'SiteController@index');
        Route::get('home','SiteController@index');
        Route::get('about','SiteController@about');
        Route::get('services','SiteController@services');
        Route::get('service/{id}','SiteController@service');
        Route::get('career','SiteController@career');
        Route::post('career','SiteController@apply');
        Route::post('client','SiteController@client');
        Route::get('pricing','SiteController@pricing');
        Route::get('contact','SiteController@contact');
});
