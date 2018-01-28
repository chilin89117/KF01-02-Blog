<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettingsTable extends Migration
{
  public function up()
  {
    Schema::create('settings', function (Blueprint $table) {
      $table->increments('id');
      $table->string('site_name');
      $table->string('contact_phone');
      $table->string('contact_email');
      $table->string('contact_address');
      $table->string('hours');
      $table->string('support');
      $table->text('about');
      $table->timestamps();
    });
  }

  public function down()
  { Schema::dropIfExists('settings'); }
}
