<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfilesTable extends Migration
{
  public function up()
  {
    Schema::create('profiles', function (Blueprint $table) {
      $table->increments('id');
      $table->integer('user_id');
      $table->string('title')->nullable();
      $table->string('avatar')->default('public/uploads/avatars/default.jpg');
      $table->text('about')->nullable();
      $table->string('facebook')->default('http://www.facebook.com');
      $table->string('youtube')->default('http://www.youtube.com');
      $table->timestamps();
    });
  }

  public function down()
  { Schema::dropIfExists('profiles'); }
}
