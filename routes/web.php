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









/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
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
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
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
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('movements')->name('movements/')->group(static function() {
            Route::get('/',                                             'MovementsController@index')->name('index');
            Route::get('/create',                                       'MovementsController@create')->name('create');
            Route::post('/',                                            'MovementsController@store')->name('store');
            Route::get('/{movement}/edit',                              'MovementsController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'MovementsController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{movement}',                                  'MovementsController@update')->name('update');
            Route::delete('/{movement}',                                'MovementsController@destroy')->name('destroy');
            Route::get('/export',                                       'MovementsController@export')->name('export');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('movement-methods')->name('movement-methods/')->group(static function() {
            Route::get('/',                                             'MovementMethodsController@index')->name('index');
            Route::get('/create',                                       'MovementMethodsController@create')->name('create');
            Route::post('/',                                            'MovementMethodsController@store')->name('store');
            Route::get('/{movementMethod}/edit',                        'MovementMethodsController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'MovementMethodsController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{movementMethod}',                            'MovementMethodsController@update')->name('update');
            Route::delete('/{movementMethod}',                          'MovementMethodsController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('payment-methods')->name('payment-methods/')->group(static function() {
            Route::get('/',                                             'PaymentMethodsController@index')->name('index');
            Route::get('/create',                                       'PaymentMethodsController@create')->name('create');
            Route::post('/',                                            'PaymentMethodsController@store')->name('store');
            Route::get('/{paymentMethod}/edit',                         'PaymentMethodsController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'PaymentMethodsController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{paymentMethod}',                             'PaymentMethodsController@update')->name('update');
            Route::delete('/{paymentMethod}',                           'PaymentMethodsController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
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
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
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
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('receivers')->name('receivers/')->group(static function() {
            Route::get('/',                                             'ReceiversController@index')->name('index');
            Route::get('/create',                                       'ReceiversController@create')->name('create');
            Route::post('/',                                            'ReceiversController@store')->name('store');
            Route::get('/{receiver}/edit',                              'ReceiversController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'ReceiversController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{receiver}',                                  'ReceiversController@update')->name('update');
            Route::delete('/{receiver}',                                'ReceiversController@destroy')->name('destroy');
            Route::get('/export',                                       'ReceiversController@export')->name('export');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('wallets')->name('wallets/')->group(static function() {
            Route::get('/',                                             'WalletsController@index')->name('index');
            Route::get('/create',                                       'WalletsController@create')->name('create');
            Route::post('/',                                            'WalletsController@store')->name('store');
            Route::get('/{wallet}/edit',                                'WalletsController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'WalletsController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{wallet}',                                    'WalletsController@update')->name('update');
            Route::delete('/{wallet}',                                  'WalletsController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
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
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('site-options')->name('site-options/')->group(static function() {
            Route::get('/',                                             'SiteOptionsController@index')->name('index');
            Route::get('/create',                                       'SiteOptionsController@create')->name('create');
            Route::post('/',                                            'SiteOptionsController@store')->name('store');
            Route::get('/{siteOption}/edit',                            'SiteOptionsController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'SiteOptionsController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{siteOption}',                                'SiteOptionsController@update')->name('update');
            Route::delete('/{siteOption}',                              'SiteOptionsController@destroy')->name('destroy');
        });
    });
});