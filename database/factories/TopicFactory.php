<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Topic::class, function (Faker $faker) {

    //随机取这个月以内的时间
    $updated_at = $faker->dateTimeThisMonth();

    //传参为最大时间不超过,创建时间比生成时间要早
    $created_at = $faker->dateTimeThisMonth($updated_at);

    $sentence = $faker->sentence();

    return [
        'title'=> $sentence,
        'body' => $faker->text(),
        'excerpt'=> $sentence,
        'created_at' => $created_at,
        'updated_at' => $updated_at
    ];
});
