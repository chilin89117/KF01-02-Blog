<?php
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class UsersTableSeeder extends Seeder
{
  public function run()
  {
    $user = App\User::create([
      'name'     => 'Admin Istrator',
      'email'    => 'admin@example.com',
      'password' => bcrypt('123456'),
      'admin'    => 1
    ]);

    App\Profile::create([
      'user_id'  => $user->id,
      'title'    => 'Administrator',
      'avatar'   => 'public/uploads/avatars/admin.jpg',
      'about'    => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
      'facebook' => 'facebook.com',
      'youtube'  => 'youtube.com'
    ]);

    // Make sure all subdirectories are owned by daemon:staff and
    // have 777 permissions
    // $file = new SplFileInfo('default.jpg');
    // Storage::putFileAs('public/uploads/avatars', $file, 'admin.jpg');
    // Storage::putFileAs('public/uploads/avatars', $file, 'default.jpg');

    factory(App\User::class, 20)->create()->each(function ($u) {
      $u->profile()->save(factory(App\Profile::class)->make());
    });
  }
}
