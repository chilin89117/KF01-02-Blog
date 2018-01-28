<?php
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class ProfilesTableSeeder extends Seeder
{
  public function run()
  {
    $faker = Faker::create();
    $profile = App\Profile::create([
      'about' => $faker->paragraph(3, true),
    ]);
  }
}
