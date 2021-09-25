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
Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ],
    'namespace'=>'App\Http\Controllers\Site'],function () {
        Route::prefix('account')->namespace('App\Http\Controllers\Account')->name('account/')->group(static function() {
            Route::get('/',                    'accountController@index')->name('client-profile');
            Route::get('/shipments',        'accountController@shipments')->name('client-shipments');
            Route::get('/wallet',        'accountController@wallet')->name('client-wallet');
            Route::get('/logout',        'accountController@shipments')->name('client-shipments');
            // Route::post('/profile',         'ProfileController@updateProfile')->name('update-profile');
            Route::get('/password',         'accountController@editPassword')->name('edit-password');
            // Route::post('/password',     'ProfileController@updatePassword')->name('update-password');
        });
});

*/

Route::middleware(['web'])->group(static function () {
    Route::namespace('App\Http\Controllers\Account\Auth')->group(static function () {
        Route::get('/account/login', 'LoginController@showLoginForm')->name('account/login');

        Route::post('/account/login', 'LoginController@login');

        Route::any('/account/logout', 'LoginController@logout')->name('account/logout');

        Route::get('/account/password-reset', 'ForgotPasswordController@showLinkRequestForm')->name('account/password/showForgotForm');
        Route::post('/account/password-reset/send', 'ForgotPasswordController@sendResetLinkEmail');
        Route::get('/account/password-reset/{token}', 'ResetPasswordController@showResetForm')->name('account/password/showResetForm');
        Route::post('/account/password-reset/reset', 'ResetPasswordController@reset');

        Route::get('/account/activation/{token}', 'ActivationController@activate')->name('account/activation/activate');
    });
    Route::prefix('account')->namespace('App\Http\Controllers\Account')->group(function () {
        // Route::post('/account/wysiwyg-media','WysiwygMediaUploadController@upload')->name('account/admin-ui::wysiwyg-upload');
        Route::post('/upload', 'FileUploadController@upload')->name('account.upload');
        Route::get('/view', 'FileViewController@view')->name('account.media::view');
    });
});
Route::middleware(['web', 'auth:' . config('account-auth.defaults.guard')])->group(static function () {
    Route::namespace('App\Http\Controllers\Account')->group(static function () {
        Route::get('/account', 'AdminHomepageController@index')->name('account');

    });
});



Route::middleware(['auth:' . config('account-auth.defaults.guard')])->group(static function () {
    Route::prefix('account')->namespace('App\Http\Controllers\Account')->name('account/')->group(static function() {
        ################################  profile ######################################
        Route::get('/profile',                                      'ProfileController@editProfile')->name('edit-profile');
        Route::post('/profile',                                     'ProfileController@updateProfile')->name('update-profile');
        Route::get('/password',                                     'ProfileController@editPassword')->name('edit-password');
        Route::post('/password',                                    'ProfileController@updatePassword')->name('update-password');
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
    });
});

