<?php

return [

    /*
    |
    | This option controls which defaults are used for admin users
    |
    */

    'defaults' => [
        'guard' => 'manger',
        'passwords' => 'manger_admins',
        'activations' => 'manger_admins',
    ],

    /*
    |
    | This option controls if Login should check also forbidden key
    |
    */

    'check_forbidden' => env('FORBIDDEN_ENABLED', false),

    /*
    |
    | This option controls if Login should check also enabled key
    |
    */

    'activation_enabled' => env('ACTIVATION_ENABLED', false),

    /*
    |--------------------------------------------------------------------------
    | Login
    |--------------------------------------------------------------------------
    |
    | This option controls the url for redirect after login
    |
    */

    'login_redirect' => '/manger',

    /*
    |--------------------------------------------------------------------------
    | Logout
    |--------------------------------------------------------------------------
    |
    | This option controls the url for redirect after logout
    |
    */

    'logout_redirect' => '/manger/login',

    /*
    |--------------------------------------------------------------------------
    | Password reset
    |--------------------------------------------------------------------------
    |
    | This option controls the url for redirect after password reset
    |
    */

    'password_reset_redirect' => '/manger/login',

    /*
    |--------------------------------------------------------------------------
    | Activations
    |--------------------------------------------------------------------------
    |
    | This options controls if activation is required or not
    | And the activation redirect controls where to redirect after activation
    |
    */

    'activation_redirect' => '/manger/login',

    /*
    |
    | This option handles the self activation form accessibility.
    |
    */

    'self_activation_form_enabled' => true,

    /*
    |--------------------------------------------------------------------------
    | Routes
    |--------------------------------------------------------------------------
    |
    | This option controls if package routes are used or not
    |
    */

    'use_routes' => true,
];
