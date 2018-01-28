<?php
namespace App;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\softDeletes;

class User extends Authenticatable
{
  use Notifiable;
  use softDeletes;

  protected $fillable = ['name', 'email', 'password', 'admin'];
  protected $hidden = ['password', 'remember_token'];

  public function profile()
  { return $this->hasOne(Profile::class); }

  public function posts()
  { return $this->hasMany(Post::class); }
}
