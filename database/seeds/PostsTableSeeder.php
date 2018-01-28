<?php
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class PostsTableSeeder extends Seeder
{
  public function run()
  {
    factory(App\Post::class, 50)->create();
    // $file = new SplFileInfo('default-post.png');
    // for ($n=1; $n<=50; $n++) {
    //   Storage::putFileAs('public/uploads/posts', $file, "$n.png");
    // }
  }
}
