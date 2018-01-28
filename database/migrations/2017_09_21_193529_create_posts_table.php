<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
  public function up()
  {
    Schema::create('posts', function (Blueprint $table) {
      $table->increments('id');
      $table->integer('user_id');
      $table->string('title');
      $table->string('slug');
      $table->text('content');
      $table->integer('category_id');
      $table->string('featured');
      $table->softDeletes();
      $table->timestamps();
    });
  }

  public function down()
  { Schema::dropIfExists('posts'); }
}
