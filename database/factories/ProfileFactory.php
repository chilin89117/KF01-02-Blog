<?php
use Faker\Generator as Faker;

$factory->define(App\Profile::class, function (Faker $faker) {
  return [ 'about' => $faker->paragraph(4, true) ];
});
