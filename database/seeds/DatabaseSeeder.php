<?php
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
  public function run()
  {
    $this->call(UsersTableSeeder::class);
    $this->call(CategoriesTableSeeder::class);
    $this->call(TagsTableSeeder::class);
    $this->call(SettingsTableSeeder::class);
    $this->call(PostsTableSeeder::class);
  }
}
