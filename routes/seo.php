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
|Route::get('/', function () {
    return view('welcome');
});
 Route::get('/seo/login', function () {
            return view('seo.auth.login');
        });
Route::get('/seo', function () {
           // return view('seo.auth.login');
            return 'seo';
        })->name('seo');
*/

Route::middleware(['web'])->group(static function () {
    Route::namespace('App\Http\Controllers\Seo\Auth')->group(static function () {
       Route::get('/seo/login', 'LoginController@showLoginForm')->name('seo/login');

        Route::post('/seo/login', 'LoginController@login');

        Route::any('/seo/logout', 'LoginController@logout')->name('seo/logout');

        Route::get('/seo/password-reset', 'ForgotPasswordController@showLinkRequestForm')->name('seo/password/showForgotForm');
        Route::post('/seo/password-reset/send', 'ForgotPasswordController@sendResetLinkEmail');
        Route::get('/seo/password-reset/{token}', 'ResetPasswordController@showResetForm')->name('seo/password/showResetForm');
        Route::post('/seo/password-reset/reset', 'ResetPasswordController@reset');

        Route::get('/seo/activation/{token}', 'ActivationController@activate')->name('seo/activation/activate');
    });

});
Route::middleware(['web', 'auth:' . config('seo-auth.defaults.guard')])->group(static function () {
    Route::namespace('App\Http\Controllers\Seo')->group(static function () {
        Route::get('/seo', 'AdminHomepageController@index')->name('seo');
        Route::prefix('seo')->group(function () {
            // Route::post('/seo/wysiwyg-media','WysiwygMediaUploadController@upload')->name('seo/admin-ui::wysiwyg-upload');
            Route::post('/upload', 'FileUploadController@upload')->name('seo.upload');
            Route::get('/view', 'FileViewController@view')->name('seo.view');
        });
    });

});



Route::middleware(['auth:' . config('seo-auth.defaults.guard')])->group(static function () {
    Route::prefix('seo')->namespace('App\Http\Controllers\Seo')->name('seo/')->group(static function() {
        Route::get('/profile',                                      'ProfileController@editProfile')->name('edit-profile');
        Route::post('/profile',                                     'ProfileController@updateProfile')->name('update-profile');
        Route::get('/password',                                     'ProfileController@editPassword')->name('edit-password');
        Route::post('/password',                                    'ProfileController@updatePassword')->name('update-password');
        Route::prefix('sliders')->name('sliders/')->group(static function() {
            Route::get('/',                                             'SlidersController@index')->name('index');
            Route::get('/create',                                       'SlidersController@create')->name('create');
            Route::post('/',                                            'SlidersController@store')->name('store');
            Route::get('/{slider}/edit',                                'SlidersController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'SlidersController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{slider}',                                    'SlidersController@update')->name('update');
            Route::delete('/{slider}',                                  'SlidersController@destroy')->name('destroy');
        });
        Route::prefix('identities')->name('identities/')->group(static function() {
            Route::get('/',                                             'IdentitiesController@index')->name('index');
            Route::get('/create',                                       'IdentitiesController@create')->name('create');
            Route::post('/',                                            'IdentitiesController@store')->name('store');
            Route::get('/{identity}/edit',                              'IdentitiesController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'IdentitiesController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{identity}',                                  'IdentitiesController@update')->name('update');
            Route::delete('/{identity}',                                'IdentitiesController@destroy')->name('destroy');
        });
        Route::prefix('pros')->name('pros/')->group(static function() {
            Route::get('/',                                             'ProsController@index')->name('index');
            Route::get('/create',                                       'ProsController@create')->name('create');
            Route::post('/',                                            'ProsController@store')->name('store');
            Route::get('/{pro}/edit',                                   'ProsController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'ProsController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{pro}',                                       'ProsController@update')->name('update');
            Route::delete('/{pro}',                                     'ProsController@destroy')->name('destroy');
        });
        Route::prefix('services')->name('services/')->group(static function() {
            Route::get('/',                                             'ServicesController@index')->name('index');
            Route::get('/create',                                       'ServicesController@create')->name('create');
            Route::post('/',                                            'ServicesController@store')->name('store');
            Route::get('/{service}/edit',                               'ServicesController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'ServicesController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{service}',                                   'ServicesController@update')->name('update');
            Route::delete('/{service}',                                 'ServicesController@destroy')->name('destroy');
        });
        Route::prefix('jobs')->name('jobs/')->group(static function() {
            Route::get('/',                                             'JobsController@index')->name('index');
            Route::get('/create',                                       'JobsController@create')->name('create');
            Route::post('/',                                            'JobsController@store')->name('store');
            Route::get('/{job}/edit',                                   'JobsController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'JobsController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{job}',                                       'JobsController@update')->name('update');
            Route::delete('/{job}',                                     'JobsController@destroy')->name('destroy');
        });
        Route::prefix('applications')->name('applications/')->group(static function() {
            Route::get('/',                                             'ApplicationsController@index')->name('index');
            Route::get('/create',                                       'ApplicationsController@create')->name('create');
            Route::post('/',                                            'ApplicationsController@store')->name('store');
            Route::get('/{application}/edit',                           'ApplicationsController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'ApplicationsController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{application}',                               'ApplicationsController@update')->name('update');
            Route::delete('/{application}',                             'ApplicationsController@destroy')->name('destroy');
        });
        Route::prefix('testimonials')->name('testimonials/')->group(static function() {
            Route::get('/',                                             'TestimonialsController@index')->name('index');
            Route::get('/create',                                       'TestimonialsController@create')->name('create');
            Route::post('/',                                            'TestimonialsController@store')->name('store');
            Route::get('/{testimonial}/edit',                           'TestimonialsController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'TestimonialsController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{testimonial}',                               'TestimonialsController@update')->name('update');
            Route::delete('/{testimonial}',                             'TestimonialsController@destroy')->name('destroy');
        });
        Route::prefix('socials')->name('socials/')->group(static function() {
            Route::get('/',                                             'SocialsController@index')->name('index');
            Route::get('/create',                                       'SocialsController@create')->name('create');
            Route::post('/',                                            'SocialsController@store')->name('store');
            Route::get('/{social}/edit',                                'SocialsController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'SocialsController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{social}',                                    'SocialsController@update')->name('update');
            Route::delete('/{social}',                                  'SocialsController@destroy')->name('destroy');
        });
        Route::prefix('contacts')->name('contacts/')->group(static function() {
            Route::get('/',                                             'ContactsController@index')->name('index');
            Route::get('/create',                                       'ContactsController@create')->name('create');
            Route::post('/',                                            'ContactsController@store')->name('store');
            Route::get('/{contact}/edit',                               'ContactsController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'ContactsController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{contact}',                                   'ContactsController@update')->name('update');
            Route::delete('/{contact}',                                 'ContactsController@destroy')->name('destroy');
        });
        Route::prefix('pages')->name('pages/')->group(static function() {
            Route::get('/',                                             'PagesController@index')->name('index');
            Route::get('/create',                                       'PagesController@create')->name('create');
            Route::post('/',                                            'PagesController@store')->name('store');
            Route::get('/{page}/edit',                                  'PagesController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'PagesController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{page}',                                      'PagesController@update')->name('update');
            Route::delete('/{page}',                                    'PagesController@destroy')->name('destroy');
        });
        Route::prefix('clients')->name('clients/')->group(static function() {
            Route::get('/',                                             'ClientsController@index')->name('index');
            Route::get('/create',                                       'ClientsController@create')->name('create');
            Route::post('/',                                            'ClientsController@store')->name('store');
            Route::get('/{client}/edit',                                'ClientsController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'ClientsController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{client}',                                    'ClientsController@update')->name('update');
            Route::delete('/{client}',                                  'ClientsController@destroy')->name('destroy');
            Route::get('/export',                                       'ClientsController@export')->name('export');
        });
        Route::get('/translations', 'TranslationsController@index');
        Route::get('/translations/export', 'TranslationsController@export')->name('translations/export');
        Route::post('/translations/import', 'TranslationsController@import')->name('translations/import');
        Route::post('/translations/import/conflicts', 'TranslationsController@importResolvedConflicts')->name('translations/import/conflicts');
        Route::post('/translations/rescan', 'RescanTranslationsController@rescan');
        Route::post('/translations/{translation}', 'TranslationsController@update');
    });
});










