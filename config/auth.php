<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Authentication Defaults
    |--------------------------------------------------------------------------
    |
    | This option controls the default authentication "guard" and password
    | reset options for your application. You may change these defaults
    | as required, but they're a perfect start for most applications.
    |
    */

    'defaults' => [
        'guard' => 'web',
        'passwords' => 'users',
    ],

    /*
    |--------------------------------------------------------------------------
    | Authentication Guards
    |--------------------------------------------------------------------------
    |
    | Next, you may define every authentication guard for your application.
    | Of course, a great default configuration has been defined for you
    | here which uses session storage and the Eloquent user provider.
    |
    | All authentication drivers have a user provider. This defines how the
    | users are actually retrieved out of your database or other storage
    | mechanisms used by this application to persist your user's data.
    |
    | Supported: "session", "token"
    |
    */

    'guards' => [
        'admin' => [
            'driver' => 'session',
            'provider' => 'admin_users',
        ],
        'account' => [
            'driver' => 'session',
            'provider' => 'account_admins',
        ],
        'shipper' => [
            'driver' => 'session',
            'provider' => 'shipper_admins',
        ],
        'seo' => [
            'driver' => 'session',
            'provider' => 'seo_admins',
        ],
        'employee' => [
            'driver' => 'session',
            'provider' => 'employee_admins',
        ],
        'manger' => [
            'driver' => 'session',
            'provider' => 'manger_admins',
        ],
        'ceo' => [
            'driver' => 'session',
            'provider' => 'ceo_admins',
        ],

        'web' => [
            'driver' => 'session',
            'provider' => 'users',
        ],

        'api' => [
            'driver' => 'token',
            'provider' => 'users',
            'hash' => false,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | User Providers
    |--------------------------------------------------------------------------
    |
    | All authentication drivers have a user provider. This defines how the
    | users are actually retrieved out of your database or other storage
    | mechanisms used by this application to persist your user's data.
    |
    | If you have multiple user tables or models you may configure multiple
    | sources which represent each model / table. These sources may then
    | be assigned to any extra authentication guards you have defined.
    |
    | Supported: "database", "eloquent"
    |
    */

    'providers' => [
        'admin_users' => [
            'driver' => 'eloquent',
            'model' => Brackets\AdminAuth\Models\AdminUser::class,
        ],
        'account_admins' => [
            'driver' => 'eloquent',
            'model' => App\Models\Users\AccountAdmin::class,
        ],
        'shipperadmins' => [
            'driver' => 'eloquent',
            'model' => App\Models\Users\ShipperAdmin::class,
        ],
        'seo_admins' => [
            'driver' => 'eloquent',
            'model' => App\Models\Users\SeoAdmin::class,
        ],
        'employee_admins' => [
            'driver' => 'eloquent',
            'model' => App\Models\Users\EmployeeAdmin::class,
        ],
        'manger_admins' => [
            'driver' => 'eloquent',
            'model' => App\Models\Users\MangerAdmin::class,
        ],
        'ceo_admins' => [
            'driver' => 'eloquent',
            'model' => App\Models\Users\CeoAdmin::class,
        ],
        'users' => [
            'driver' => 'eloquent',
            'model' => App\Models\User::class,
        ],

        // 'users' => [
        //     'driver' => 'database',
        //     'table' => 'users',
        // ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Resetting Passwords
    |--------------------------------------------------------------------------
    |
    | You may specify multiple password reset configurations if you have more
    | than one user table or model in the application and you want to have
    | separate password reset settings based on the specific user types.
    |
    | The expire time is the number of minutes that the reset token should be
    | considered valid. This security feature keeps tokens short-lived so
    | they have less time to be guessed. You may change this as needed.
    |
    */

    'passwords' => [
        'admin_users' => [
            'provider' => 'admin_users',
            'table' => 'admin_password_resets',
            'expire' => 60,
        ],

        'account_admins' => [
            'provider' => 'account_admins',
            'table' => 'account_password_resets',
            'expire' => 60,
        ],
        'shipper_admins' => [
            'provider' => 'shipper_admins',
            'table' => 'shipper_password_resets',
            'expire' => 60,
        ],
        'seo_admins' => [
            'provider' => 'seo_admins',
            'table' => 'seo_password_resets',
            'expire' => 60,
        ],
        'employee_admins' => [
            'provider' => 'employee_admins',
            'table' => 'employee_password_resets',
            'expire' => 60,
        ],
        'manger_admins' => [
            'provider' => 'manger_admins',
            'table' => 'manger_password_resets',
            'expire' => 60,
        ],
        'ceo_admins' => [
            'provider' => 'ceo_admins',
            'table' => 'ceo_password_resets',
            'expire' => 60,
        ],

        'users' => [
            'provider' => 'users',
            'table' => 'password_resets',
            'expire' => 60,
            'throttle' => 60,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Password Confirmation Timeout
    |--------------------------------------------------------------------------
    |
    | Here you may define the amount of seconds before a password confirmation
    | times out and the user is prompted to re-enter their password via the
    | confirmation screen. By default, the timeout lasts for three hours.
    |
    */

    'password_timeout' => 10800,

];
