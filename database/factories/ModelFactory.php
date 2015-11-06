<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$faker = \Faker\Factory::create('pt_BR');

$factory->define(CodeDelivery\Models\User::class, function (Faker\Generator $faker) use ($faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'password' => bcrypt('123456'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(CodeDelivery\Models\Client::class, function (Faker\Generator $faker) use ($faker) {
    return [
        'phone' => $faker->phoneNumber,
        'address' => $faker->streetAddress,
        'district' => $faker->citySuffix,
        'city' => $faker->city,
        'state' => $faker->stateAbbr,
        'zipcode' => $faker->postcode
    ];
});

$factory->define(CodeDelivery\Models\Category::class, function (Faker\Generator $faker) use ($faker) {
    return [
        'name' => $faker->word
    ];
});

$factory->define(CodeDelivery\Models\Product::class, function (Faker\Generator $faker) use ($faker) {
    return [
        'name' => $faker->word,
        'description' => $faker->sentence,
        'price' => $faker->numberBetween(10, 50)
    ];
});

$factory->define(CodeDelivery\Models\Order::class, function (Faker\Generator $faker) use ($faker) {
    return [
        'client_id' => rand(1, 10),
        'shipping' => 5,
        'total' => 0,
        'status' => 0,
        'user_deliveryman_id' => rand(1, 2),
    ];
});


$factory->define(CodeDelivery\Models\OrderItem::class, function (Faker\Generator $faker) use ($faker) {
    return [

    ];
});

$factory->define(CodeDelivery\Models\Cupom::class, function (Faker\Generator $faker) use ($faker) {
    return [
        'code' => rand(100, 1000),
        'value' => rand(50, 100),
        'used' => rand(0, 1)
    ];
});
