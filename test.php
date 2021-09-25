<?php
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
