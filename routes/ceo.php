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
 return Redirect::to(Config::get('app.default_language'));
    return view('welcome');
});
*/


Route::middleware(['web'])->group(static function () {
    Route::namespace('App\Http\Controllers\Ceo\Auth')->group(static function () {
        Route::get('/ceo/login', 'LoginController@showLoginForm')->name('ceo/login');

        Route::post('/ceo/login', 'LoginController@login');

        Route::any('/ceo/logout', 'LoginController@logout')->name('ceo/logout');

        Route::get('/ceo/password-reset', 'ForgotPasswordController@showLinkRequestForm')->name('ceo/password/showForgotForm');
        Route::post('/ceo/password-reset/send', 'ForgotPasswordController@sendResetLinkEmail');
        Route::get('/ceo/password-reset/{token}', 'ResetPasswordController@showResetForm')->name('ceo/password/showResetForm');
        Route::post('/ceo/password-reset/reset', 'ResetPasswordController@reset');

        Route::get('/ceo/activation/{token}', 'ActivationController@activate')->name('ceo/activation/activate');
    });
    Route::prefix('ceo')->namespace('App\Http\Controllers\Ceo')->group(function () {
        // Route::post('/ceo/wysiwyg-media','WysiwygMediaUploadController@upload')->name('ceo/admin-ui::wysiwyg-upload');
        Route::post('/upload', 'FileUploadController@upload')->name('ceo.upload');
        Route::get('/view', 'FileViewController@view')->name('ceo.media::view');
    });
});
Route::middleware(['web', 'auth:' . config('ceo-auth.defaults.guard')])->group(static function () {
    Route::namespace('App\Http\Controllers\Ceo')->group(static function () {
        Route::get('/ceo', 'AdminHomepageController@index')->name('ceo');

    });
});



Route::middleware(['auth:' . config('ceo-auth.defaults.guard')])->group(static function () {
    Route::prefix('ceo')->namespace('App\Http\Controllers\Ceo')->name('ceo/')->group(static function() {
        ################################  profile ######################################
        Route::get('/profile',                                      'ProfileController@editProfile')->name('edit-profile');
        Route::post('/profile',                                     'ProfileController@updateProfile')->name('update-profile');
        Route::get('/password',                                     'ProfileController@editPassword')->name('edit-password');
        Route::post('/password',                                    'ProfileController@updatePassword')->name('update-password');
        ################################  user ######################################
        Route::prefix('manger-admin')->name('manger-admin/')->group(static function() {
            Route::get('/',                                             'MangerAdminsController@index')->name('index');
            Route::get('/create',                                       'MangerAdminsController@create')->name('create');
            Route::post('/',                                            'MangerAdminsController@store')->name('store');
            Route::get('/{adminUser}/impersonal-login',                 'MangerAdminsController@impersonalLogin')->name('impersonal-login');
            Route::get('/{adminUser}/edit',                             'MangerAdminsController@edit')->name('edit');
            Route::post('/{adminUser}',                                 'MangerAdminsController@update')->name('update');
            Route::delete('/{adminUser}',                               'MangerAdminsController@destroy')->name('destroy');
            Route::get('/{adminUser}/resend-activation',                'MangerAdminsController@resendActivationEmail')->name('resendActivationEmail');
        });
        Route::prefix('employee-admin')->name('employee-admin/')->group(static function() {
            Route::get('/',                                             'EmployeeAdminsController@index')->name('index');
            Route::get('/create',                                       'EmployeeAdminsController@create')->name('create');
            Route::post('/',                                            'EmployeeAdminsController@store')->name('store');
            Route::get('/{adminUser}/impersonal-login',                 'EmployeeAdminsController@impersonalLogin')->name('impersonal-login');
            Route::get('/{adminUser}/edit',                             'EmployeeAdminsController@edit')->name('edit');
            Route::post('/{adminUser}',                                 'EmployeeAdminsController@update')->name('update');
            Route::delete('/{adminUser}',                               'EmployeeAdminsController@destroy')->name('destroy');
            Route::get('/{adminUser}/resend-activation',                'EmployeeAdminsController@resendActivationEmail')->name('resendActivationEmail');
        });
        Route::prefix('seo-admin')->name('seo-admin/')->group(static function() {
            Route::get('/',                                             'SeoAdminsController@index')->name('index');
            Route::get('/create',                                       'SeoAdminsController@create')->name('create');
            Route::post('/',                                            'SeoAdminsController@store')->name('store');
            Route::get('/{adminUser}/impersonal-login',                 'SeoAdminsController@impersonalLogin')->name('impersonal-login');
            Route::get('/{adminUser}/edit',                             'SeoAdminsController@edit')->name('edit');
            Route::post('/{adminUser}',                                 'SeoAdminsController@update')->name('update');
            Route::delete('/{adminUser}',                               'SeoAdminsController@destroy')->name('destroy');
            Route::get('/{adminUser}/resend-activation',                'SeoAdminsController@resendActivationEmail')->name('resendActivationEmail');
        });
        Route::prefix('shipper-admin')->name('shipper-admin/')->group(static function() {
            Route::get('/',                                             'ShipperAdminsController@index')->name('index');
            Route::get('/create',                                       'ShipperAdminsController@create')->name('create');
            Route::post('/',                                            'ShipperAdminsController@store')->name('store');
            Route::get('/{adminUser}/impersonal-login',                 'ShipperAdminsController@impersonalLogin')->name('impersonal-login');
            Route::get('/{adminUser}/edit',                             'ShipperAdminsController@edit')->name('edit');
            Route::post('/{adminUser}',                                 'ShipperAdminsController@update')->name('update');
            Route::delete('/{adminUser}',                               'ShipperAdminsController@destroy')->name('destroy');
            Route::get('/{adminUser}/resend-activation',                'ShipperAdminsController@resendActivationEmail')->name('resendActivationEmail');
        });
        Route::prefix('account-admin')->name('account-admin/')->group(static function() {
            Route::get('/',                                             'AccountAdminsController@index')->name('index');
            Route::get('/create',                                       'AccountAdminsController@create')->name('create');
            Route::post('/',                                            'AccountAdminsController@store')->name('store');
            Route::get('/{adminUser}/impersonal-login',                 'AccountAdminsController@impersonalLogin')->name('impersonal-login');
            Route::get('/{adminUser}/edit',                             'AccountAdminsController@edit')->name('edit');
            Route::post('/{adminUser}',                                 'AccountAdminsController@update')->name('update');
            Route::delete('/{adminUser}',                               'AccountAdminsController@destroy')->name('destroy');
            Route::get('/{adminUser}/resend-activation',                'AccountAdminsController@resendActivationEmail')->name('resendActivationEmail');
        });
        ################################  website ######################################
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
        ################################  system ######################################
        Route::prefix('shipments')->name('shipments/')->group(static function() {
            Route::get('/',                                             'ShipmentsController@index')->name('index');
            Route::get('/create',                                       'ShipmentsController@create')->name('create');
            Route::post('/',                                            'ShipmentsController@store')->name('store');
            Route::get('/{shipment}/edit',                              'ShipmentsController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'ShipmentsController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{shipment}',                                  'ShipmentsController@update')->name('update');
            Route::delete('/{shipment}',                                'ShipmentsController@destroy')->name('destroy');
            Route::get('/export',                                       'ShipmentsController@export')->name('export');
        });
        Route::prefix('places')->name('places/')->group(static function() {
            Route::get('/',                                             'PlacesController@index')->name('index');
            Route::get('/create',                                       'PlacesController@create')->name('create');
            Route::post('/',                                            'PlacesController@store')->name('store');
            Route::get('/{place}/edit',                                 'PlacesController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'PlacesController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{place}',                                     'PlacesController@update')->name('update');
            Route::delete('/{place}',                                   'PlacesController@destroy')->name('destroy');
            Route::get('/export',                                       'PlacesController@export')->name('export');
        });
        Route::prefix('roads')->name('roads/')->group(static function() {
            Route::get('/',                                             'RoadsController@index')->name('index');
            Route::get('/create',                                       'RoadsController@create')->name('create');
            Route::post('/',                                            'RoadsController@store')->name('store');
            Route::get('/{road}/edit',                                  'RoadsController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'RoadsController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{road}',                                      'RoadsController@update')->name('update');
            Route::delete('/{road}',                                    'RoadsController@destroy')->name('destroy');
            Route::get('/export',                                       'RoadsController@export')->name('export');
        });
        Route::prefix('payment-methods')->name('payment-methods/')->group(static function() {
            Route::get('/',                                             'PaymentMethodsController@index')->name('index');
            Route::get('/create',                                       'PaymentMethodsController@create')->name('create');
            Route::post('/',                                            'PaymentMethodsController@store')->name('store');
            Route::get('/{paymentMethod}/edit',                         'PaymentMethodsController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'PaymentMethodsController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{paymentMethod}',                             'PaymentMethodsController@update')->name('update');
            Route::delete('/{paymentMethod}',                           'PaymentMethodsController@destroy')->name('destroy');
        });
        Route::prefix('wallets')->name('wallets/')->group(static function() {
            Route::get('/',                                             'WalletsController@index')->name('index');
            Route::get('/create',                                       'WalletsController@create')->name('create');
            Route::post('/',                                            'WalletsController@store')->name('store');
            Route::get('/{wallet}/edit',                                'WalletsController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'WalletsController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{wallet}',                                    'WalletsController@update')->name('update');
            Route::delete('/{wallet}',                                  'WalletsController@destroy')->name('destroy');
        });
        Route::prefix('withdrawals')->name('withdrawals/')->group(static function() {
            Route::get('/',                                             'WithdrawalsController@index')->name('index');
            Route::get('/create',                                       'WithdrawalsController@create')->name('create');
            Route::post('/',                                            'WithdrawalsController@store')->name('store');
            Route::get('/{withdrawal}/edit',                            'WithdrawalsController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'WithdrawalsController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{withdrawal}',                                'WithdrawalsController@update')->name('update');
            Route::delete('/{withdrawal}',                              'WithdrawalsController@destroy')->name('destroy');
            Route::get('/export',                                       'WithdrawalsController@export')->name('export');
        });
        Route::prefix('branches')->name('branches/')->group(static function() {
            Route::get('/',                                             'BranchesController@index')->name('index');
            Route::get('/create',                                       'BranchesController@create')->name('create');
            Route::post('/',                                            'BranchesController@store')->name('store');
            Route::get('/{branch}/edit',                                'BranchesController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'BranchesController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{branch}',                                    'BranchesController@update')->name('update');
            Route::delete('/{branch}',                                  'BranchesController@destroy')->name('destroy');
            Route::get('/export',                                       'BranchesController@export')->name('export');
        });
        Route::prefix('receiveres')->name('receiveres/')->group(static function() {
            Route::get('/',                                             'ReceiveresController@index')->name('index');
            Route::get('/create',                                       'ReceiveresController@create')->name('create');
            Route::post('/',                                            'ReceiveresController@store')->name('store');
            Route::get('/{receivere}/edit',                             'ReceiveresController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'ReceiveresController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{receivere}',                                 'ReceiveresController@update')->name('update');
            Route::delete('/{receivere}',                               'ReceiveresController@destroy')->name('destroy');
            Route::get('/export',                                       'ReceiveresController@export')->name('export');
        });
        ################################  translations ######################################
        Route::get('/translations', 'TranslationsController@index');
        Route::get('/translations/export', 'TranslationsController@export')->name('translations/export');
        Route::post('/translations/import', 'TranslationsController@import')->name('translations/import');
        Route::post('/translations/import/conflicts', 'TranslationsController@importResolvedConflicts')->name('translations/import/conflicts');
        Route::post('/translations/rescan', 'RescanTranslationsController@rescan');
        Route::post('/translations/{translation}', 'TranslationsController@update');
    });
});


