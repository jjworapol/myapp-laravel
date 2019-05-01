<?php

use App\User;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => bcrypt('password'), // password
        'remember_token' => Str::random(10),
    ];

});

$factory->state(User::class,'admin',function(Faker $faker){ //if create in admin
    return[
        'password' => Hash::make('PasswordForAdmin'),
    'role'=>'ADMINISTRATOR'
    ];
});

$factory->state(User::class,'creator',function(Faker $faker){
    return[
        'password' => Hash::make('PasswordForCreator'),
        'role'=>'CREATOR'
    ];
});

//viewer is default mai jum pen tong sai
$factory->state(User::class,'viewer',function(Faker $faker){
    return[
        'password' => Hash::make('PasswordForViewer'),
        'role'=>'VIEWER'
    ];
});