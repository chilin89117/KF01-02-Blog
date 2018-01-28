<?php
use Faker\Generator as Faker;

$factory->define(App\Post::class, function (Faker $faker) {
  $user_id = $faker->numberBetween(1, 21); // 20 users plus 'Admin'
  $title = $faker->sentence(6, true);
  $title = substr($title, 0, strlen($title) - 1); // strip out the '.'
  $slug = str_slug($title, '-');
  $content = $faker->paragraphs(3, true);
  $category_id = $faker->numberBetween(1, 6); // 6 categories
  $n = $faker->unique()->numberBetween(1,50); // same img with different names
  $featured = "public/uploads/posts/$n.png";
  return [
    'user_id' => $user_id,
    'title' => $title,
    'slug' => $slug,
    'content' => $content,
    'category_id' => $category_id,
    'featured' => $featured,
  ];
});
