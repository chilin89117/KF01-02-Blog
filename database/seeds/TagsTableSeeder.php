<?php
use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder
{
  public function run()
  {
    App\Tag::create([
      'tag' => 'HTML 5',
    ]);
    App\Tag::create([
      'tag' => 'CSS 3',
    ]);
    App\Tag::create([
      'tag' => 'ES6',
    ]);
    App\Tag::create([
      'tag' => 'Laravel 5',
    ]);
    App\Tag::create([
      'tag' => 'Vue.js 2',
    ]);
    App\Tag::create([
      'tag' => 'MySQL',
    ]);
    App\Tag::create([
      'tag' => 'MongoDB',
    ]);
    App\Tag::create([
      'tag' => 'Node.js',
    ]);
  }
}
