<?php

use App\Models\User;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory as EloquentFactory;

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

/** @var EloquentFactory $factory */
$factory->define(\App\Models\Message::class, function (Faker $faker) {
    return [
	'user_id' => User::all()->random()->id,
        'content' => $faker->text,
    ];
});
