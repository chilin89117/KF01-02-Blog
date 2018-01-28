<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;
use App\Category;
use App\Tag;

class DashboardController extends Controller
{
  public function index()
  {
    $num_users = User::all()->count();
    $num_pub_posts = Post::all()->count();
    $num_trash_posts = Post::onlyTrashed()->count();
    $num_cats  = Category::all()->count();
    $num_tags  = Tag::all()->count();
    return view('admin.dashboard', compact('num_users', 'num_pub_posts',
                                           'num_trash_posts', 'num_cats',
                                           'num_tags'));
  }
}
