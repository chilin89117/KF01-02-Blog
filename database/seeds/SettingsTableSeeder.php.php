<?php
use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
  public function run()
  {
    App\Setting::create([
      'site_name'       => 'LaravelCMS',
      'contact_phone'   => '702-555-1111',
      'contact_email'   => 'admin@example.com',
      'contact_address' => '12345 E. Sunset Blvd, Henderson, NV 89999',
      'hours'           => '9am - 5pm',
      'support'         => '702-555-2222',
      'about'           => 'Leverage agile frameworks to provide a robust synopsis for high level overviews. Iterative approaches to corporate strategy foster collaborative thinking.',
    ]);
  }
}
