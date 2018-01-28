<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
  protected $guarded = [];
  
  public function user()
  { return $this->belongsTo(User::class); }

  // Image is stored as "public/uploads/avatars/<filename>" in 
  // "storage/app" directory. But symbolic link is from 
  // "public/storage" to "storage/app/public", so the file for
  // the asset() function should be converted to 
  // "storage/uploads/avatars/<filename>".
  public function getAvatarAttribute($avatar)
  { return str_replace_first('public', 'storage', $avatar); }
}
