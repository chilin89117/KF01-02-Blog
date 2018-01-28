<?php
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
  public function run()
  {
    App\Category::create([
      'name' => 'HTML/CSS',
    ]);
    App\Category::create([
      'name' => 'JavaScript',
    ]);
    App\Category::create([
      'name' => 'PHP',
    ]);
    App\Category::create([
      'name' => 'Database',
    ]);
    App\Category::create([
      'name' => 'Machine Learning',
    ]);
    App\Category::create([
      'name' => 'Video Tutorials',
    ]);
  }
}