<?php

use Faker\Generator as Faker;
use App\Order;


$factory->define(Order::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'item_count' => rand(1,10),
    ];
});
