<?php

/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(Brackets\AdminAuth\Models\AdminUser::class, function (Faker\Generator $faker) {
    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'email' => $faker->email,
        'password' => bcrypt($faker->password),
        'remember_token' => null,
        'activated' => true,
        'forbidden' => $faker->boolean(),
        'language' => 'en',
        'deleted_at' => null,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        'last_login_at' => $faker->dateTime,

    ];
});/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Slider::class, static function (Faker\Generator $faker) {
    return [
        'activated' => $faker->boolean(),
        'is_published' => $faker->boolean(),
        'link1' => $faker->sentence,
        'link2' => $faker->sentence,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,

        'title' => ['en' => $faker->sentence],
        'text' => ['en' => $faker->sentence],

    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Identity::class, static function (Faker\Generator $faker) {
    return [
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,

        'title' => ['en' => $faker->sentence],
        'text' => ['en' => $faker->sentence],

    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Pro::class, static function (Faker\Generator $faker) {
    return [
        'link1' => $faker->sentence,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,

        'title' => ['en' => $faker->sentence],
        'text' => ['en' => $faker->sentence],

    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Service::class, static function (Faker\Generator $faker) {
    return [
        'is_published' => $faker->boolean(),
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,

        'title' => ['en' => $faker->sentence],
        'text' => ['en' => $faker->sentence],
        'body' => ['en' => $faker->sentence],

    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Job::class, static function (Faker\Generator $faker) {
    return [
        'is_published' => $faker->boolean(),
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,

        'title' => ['en' => $faker->sentence],

    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Application::class, static function (Faker\Generator $faker) {
    return [
        'fullname' => $faker->sentence,
        'job_id' => $faker->randomNumber(5),
        'bday' => $faker->date(),
        'male' => $faker->boolean(),
        'military' => $faker->sentence,
        'email' => $faker->email,
        'phone' => $faker->sentence,
        'phone_2' => $faker->sentence,
        'city' => $faker->sentence,
        'area' => $faker->sentence,
        'education' => $faker->sentence,
        'experience' => $faker->sentence,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,


    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Testimonial::class, static function (Faker\Generator $faker) {
    return [
        'is_published' => $faker->boolean(),
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,

        'title' => ['en' => $faker->sentence],
        'job' => ['en' => $faker->sentence],
        'text' => ['en' => $faker->sentence],

    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Social::class, static function (Faker\Generator $faker) {
    return [
        'icon' => $faker->sentence,
        'link' => $faker->sentence,
        'is_published' => $faker->boolean(),
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,


    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Page::class, static function (Faker\Generator $faker) {
    return [
        'is_published' => $faker->boolean(),
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,

        'title' => ['en' => $faker->sentence],
        'description' => ['en' => $faker->sentence],
        'h1' => ['en' => $faker->sentence],
        'body' => ['en' => $faker->sentence],

    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Shipment::class, static function (Faker\Generator $faker) {
    return [
        'weight' => $faker->randomFloat,
        'pkg_num' => $faker->randomNumber(5),
        'status' => $faker->sentence,
        'published_at' => $faker->dateTime,
        'end_at' => $faker->dateTime,
        'prod_kind' => $faker->sentence,
        'prod_price' => $faker->sentence,
        'way_id' => $faker->randomNumber(5),
        'from_user_id' => $faker->randomNumber(5),
        'to_user_id' => $faker->randomNumber(5),
        'pay_way' => $faker->randomNumber(5),
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,


    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Place::class, static function (Faker\Generator $faker) {
    return [
        'name' => $faker->firstName,
        'enabled' => $faker->boolean(),
        'parent_id' => $faker->randomNumber(5),
        'bransh_id' => $faker->randomNumber(5),
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,


    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Road::class, static function (Faker\Generator $faker) {
    return [
        'price' => $faker->randomFloat,
        'time' => $faker->randomFloat,
        'enabled' => $faker->boolean(),
        'from_id' => $faker->randomNumber(5),
        'to_id' => $faker->randomNumber(5),
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,


    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\PaymentMethod::class, static function (Faker\Generator $faker) {
    return [
        'fees' => $faker->randomFloat,
        'sale' => $faker->randomFloat,
        'enabled' => $faker->boolean(),
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,

        'name' => ['en' => $faker->firstName],

    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Wallet::class, static function (Faker\Generator $faker) {
    return [
        'money' => $faker->randomFloat,
        'belongs_to' => $faker->sentence,
        'belongs_to_id' => $faker->randomNumber(5),
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,


    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Withdrawal::class, static function (Faker\Generator $faker) {
    return [
        'price' => $faker->randomFloat,
        'in_out' => $faker->boolean(),
        'enabled' => $faker->boolean(),
        'from_id' => $faker->randomNumber(5),
        'to_id' => $faker->randomNumber(5),
        'way_id' => $faker->randomNumber(5),
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,

        'status' => ['en' => $faker->sentence],

    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Contact::class, static function (Faker\Generator $faker) {
    return [
        'icon' => $faker->sentence,
        'is_published' => $faker->boolean(),
        'branch_id' => $faker->randomNumber(5),
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,

        'title' => ['en' => $faker->sentence],
        'text' => ['en' => $faker->sentence],

    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Branch::class, static function (Faker\Generator $faker) {
    return [
        'location' => $faker->sentence,
        'is_published' => $faker->boolean(),
        'manger' => $faker->randomNumber(5),
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,

        'name' => ['en' => $faker->firstName],
        'governrate' => ['en' => $faker->sentence],

    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Client::class, static function (Faker\Generator $faker) {
    return [
        'phone' => $faker->sentence,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,


    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Receivere::class, static function (Faker\Generator $faker) {
    return [
        'fullname' => $faker->sentence,
        'address' => $faker->sentence,
        'phone' => $faker->sentence,
        'phone_2' => $faker->sentence,
        'city' => $faker->sentence,
        'area' => $faker->sentence,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,


    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Pro::class, static function (Faker\Generator $faker) {
    return [
        'icon' => $faker->sentence,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,

        'title' => ['en' => $faker->sentence],
        'text' => ['en' => $faker->sentence],

    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Shipment::class, static function (Faker\Generator $faker) {
    return [
        'pkg_num' => $faker->randomNumber(5),
        'road_id' => $faker->randomNumber(5),
        'place_from_id' => $faker->randomNumber(5),
        'branch_from_id' => $faker->randomNumber(5),
        'place_to_id' => $faker->randomNumber(5),
        'branch_to_id' => $faker->randomNumber(5),
        'weight' => $faker->randomFloat,
        'pickup' => $faker->boolean(),
        'todoor' => $faker->boolean(),
        'express' => $faker->boolean(),
        'breakable' => $faker->boolean(),
        'model_type' => $faker->sentence,
        'model_id' => $faker->sentence,
        'shipper_id' => $faker->randomNumber(5),
        'receiver_id' => $faker->randomNumber(5),
        'status' => $faker->sentence,
        'published_at' => $faker->dateTime,
        'end_at' => $faker->dateTime,
        'shipp_price' => $faker->sentence,
        'shipp_cost' => $faker->sentence,
        'shipp_sale' => $faker->sentence,
        'shipp_total' => $faker->sentence,
        'payment_method_id' => $faker->randomNumber(5),
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,


    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Road::class, static function (Faker\Generator $faker) {
    return [
        'price' => $faker->randomFloat,
        'time' => $faker->randomFloat,
        'enabled' => $faker->boolean(),
        'pickup' => $faker->boolean(),
        'todoor' => $faker->boolean(),
        'express' => $faker->boolean(),
        'breakable' => $faker->boolean(),
        'from_id' => $faker->randomNumber(5),
        'to_id' => $faker->randomNumber(5),
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,


    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Movement::class, static function (Faker\Generator $faker) {
    return [
        'reason' => $faker->sentence,
        'shipment_id' => $faker->randomNumber(5),
        'method_id' => $faker->randomNumber(5),
        'model_type' => $faker->sentence,
        'model_id' => $faker->sentence,
        'employee_id' => $faker->randomNumber(5),
        'branch_id' => $faker->randomNumber(5),
        'method_parent_id' => $faker->randomNumber(5),
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,


    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\MovementMethod::class, static function (Faker\Generator $faker) {
    return [
        'parent_id' => $faker->randomNumber(5),

        'method' => ['en' => $faker->sentence],

    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Place::class, static function (Faker\Generator $faker) {
    return [
        'name' => $faker->firstName,
        'enabled' => $faker->boolean(),
        'parent_id' => $faker->randomNumber(5),
        'branch_id' => $faker->randomNumber(5),
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,


    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Branch::class, static function (Faker\Generator $faker) {
    return [
        'location' => $faker->sentence,
        'lng' => $faker->randomFloat,
        'lat' => $faker->randomFloat,
        'is_published' => $faker->boolean(),
        'manger' => $faker->randomNumber(5),
        'agent' => $faker->randomNumber(5),
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,

        'name' => ['en' => $faker->firstName],
        'governorate' => ['en' => $faker->sentence],

    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Receiver::class, static function (Faker\Generator $faker) {
    return [
        'fullname' => $faker->sentence,
        'address' => $faker->sentence,
        'phone' => $faker->sentence,
        'phone_2' => $faker->sentence,
        'city' => $faker->sentence,
        'area' => $faker->sentence,
        'location' => $faker->sentence,
        'lng' => $faker->randomFloat,
        'lat' => $faker->randomFloat,
        'governorate' => $faker->sentence,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,


    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Wallet::class, static function (Faker\Generator $faker) {
    return [
        'money' => $faker->randomFloat,
        'belongs_to_model_type' => $faker->sentence,
        'belongs_to_model_id' => $faker->sentence,
        'belongs_to_id' => $faker->randomNumber(5),
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,


    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Withdrawal::class, static function (Faker\Generator $faker) {
    return [
        'price' => $faker->randomFloat,
        'reason' => $faker->sentence,
        'model_type' => $faker->sentence,
        'model_id' => $faker->sentence,
        'made_id' => $faker->randomNumber(5),
        'in_out' => $faker->boolean(),
        'enabled' => $faker->boolean(),
        'from_id' => $faker->randomNumber(5),
        'to_id' => $faker->randomNumber(5),
        'payment_method_id' => $faker->randomNumber(5),
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,


    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\SiteOption::class, static function (Faker\Generator $faker) {
    return [
        'weight_default' => $faker->randomFloat,
        'weight_fee' => $faker->randomFloat,
        'pickup' => $faker->boolean(),
        'pickup_fee' => $faker->randomFloat,
        'todoor' => $faker->boolean(),
        'todoor_fee' => $faker->randomFloat,
        'express' => $faker->boolean(),
        'express_fee' => $faker->randomFloat,
        'breakable' => $faker->boolean(),
        'breakable_fee' => $faker->randomFloat,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,


    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Shipment::class, static function (Faker\Generator $faker) {
    return [
        'pkg_num' => $faker->randomNumber(5),
        'road_id' => $faker->randomNumber(5),
        'place_from_id' => $faker->randomNumber(5),
        'branch_from_id' => $faker->randomNumber(5),
        'place_to_id' => $faker->randomNumber(5),
        'branch_to_id' => $faker->randomNumber(5),
        'weight' => $faker->randomFloat,
        'pickup' => $faker->boolean(),
        'todoor' => $faker->boolean(),
        'express' => $faker->boolean(),
        'breakable' => $faker->boolean(),
        'shipper_type' => $faker->sentence,
        'shipper_id' => $faker->sentence,
        'receiver_id' => $faker->randomNumber(5),
        'status' => $faker->sentence,
        'published_at' => $faker->dateTime,
        'end_at' => $faker->dateTime,
        'shipp_price' => $faker->sentence,
        'shipp_cost' => $faker->sentence,
        'shipp_sale' => $faker->sentence,
        'shipp_total' => $faker->sentence,
        'payment_method_id' => $faker->randomNumber(5),
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,


    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Movement::class, static function (Faker\Generator $faker) {
    return [
        'reason' => $faker->sentence,
        'shipment_id' => $faker->randomNumber(5),
        'method_id' => $faker->randomNumber(5),
        'employee_type' => $faker->sentence,
        'employee_id' => $faker->sentence,
        'branch_id' => $faker->randomNumber(5),
        'method_parent_id' => $faker->randomNumber(5),
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,


    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Withdrawal::class, static function (Faker\Generator $faker) {
    return [
        'price' => $faker->randomFloat,
        'reason' => $faker->sentence,
        'made_type' => $faker->sentence,
        'made_id' => $faker->sentence,
        'in_out' => $faker->boolean(),
        'enabled' => $faker->boolean(),
        'from_id' => $faker->randomNumber(5),
        'to_id' => $faker->randomNumber(5),
        'payment_method_id' => $faker->randomNumber(5),
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,


    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Wallet::class, static function (Faker\Generator $faker) {
    return [
        'money' => $faker->randomFloat,
        'belongs_to_type' => $faker->sentence,
        'belongs_to_id' => $faker->sentence,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,


    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Withdrawal::class, static function (Faker\Generator $faker) {
    return [
        'price' => $faker->randomFloat,
        'reason_type' => $faker->sentence,
        'reason_id' => $faker->sentence,
        'made_type' => $faker->sentence,
        'made_id' => $faker->sentence,
        'in_out' => $faker->boolean(),
        'enabled' => $faker->boolean(),
        'from_id' => $faker->randomNumber(5),
        'to_id' => $faker->randomNumber(5),
        'payment_method_id' => $faker->randomNumber(5),
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,


    ];
});
