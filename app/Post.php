<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class Post extends Model
{
  use softDeletes;
  protected $fillable = ['user_id', 'title', 'featured', 
                         'content', 'category_id', 'slug'];
  protected $dates    = ['deleted_at'];

  public function category()
  { return $this->belongsTo(Category::class); }

  public function tags()
  { return $this->belongsToMany(Tag::class); }

  public function user()
  { return $this->belongsTo(User::class); }

  // Image is stored as "public/uploads/posts/<filename>" in 
  // "storage/app" directory. But symbolic link is from 
  // "public/storage" to "storage/app/public", so the file for
  // the asset() function should be converted to 
  // "storage/uploads/posts/<filename>".
  public function getFeaturedAttribute($featured)
  { return str_replace_first('public', 'storage', $featured); }

  public function getTitleAttribute($title)
  { return title_case($title); }
}