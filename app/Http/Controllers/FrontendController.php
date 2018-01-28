<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Newsletter;
use App\Setting;
use App\Category;
use App\Post;
use App\Tag;
use App\User;

class FrontendController extends Controller
{
  public function index()
  {
    $settings = Setting::first();
    $categories = Category::take(5)->get();
    $latest_posts = Post::latest()->take(3)->get();
    // Top 3 posts from the most popular category
    $top_cat_id = DB::table('posts')
                  ->select(DB::raw('count(*) as n, category_id'))
                  ->groupBy('category_id')
                  ->orderBy('n','desc')
                  ->first()
                  ->category_id;
    $top_cat = Category::find($top_cat_id);
    $top_cat_posts = $top_cat->posts()->latest()->take(3)->get();
    return view('index', compact('settings', 'categories', 'latest_posts',
                                 'top_cat', 'top_cat_posts'));
  }

  public function show($slug)
  {
    $settings = Setting::first();
    $categories = Category::take(5)->get();
    $post = Post::where('slug', $slug)->first();
    $next_id = Post::where('id', '>', $post->id)->min('id');
    $prev_id = Post::where('id', '<', $post->id)->max('id');
    $next_post = Post::find($next_id);
    $prev_post = Post::find($prev_id);
    return view('show', compact('settings', 'categories', 'post',
                                'next_post', 'prev_post'));
  }

  public function category(Category $category)
  {
    $settings = Setting::first();
    $categories = Category::take(5)->get();
    $posts = Post::where('category_id', $category->id)->latest()->get();
    $tags = Tag::orderBy('tag')->get();
    return view('category', compact('settings', 'categories', 'category',
                                    'posts', 'tags'));
  }

  public function tag(Tag $tag)
  {
    $settings = Setting::first();
    $categories = Category::take(5)->get();
    $posts = $tag->posts()->latest()->get();
    $all_categories = Category::orderBy('name')->get();
    return view('tag', compact('settings', 'categories', 'tag',
                               'posts', 'all_categories'));
  }

  public function user(User $user)
  {
    $settings = Setting::first();
    $categories = Category::take(5)->get();
    $posts = $user->posts()->latest()->get();
    $all_categories = Category::orderBy('name')->get();
    return view('user', compact('settings', 'categories', 'user',
                                'posts', 'all_categories'));
  }

  public function search(Request $request)
  {
    $settings = Setting::first();
    $categories = Category::take(5)->get();
    $all_categories = Category::orderBy('name')->get();
    $posts = Post::where('title', 'like', '%'.$request->search.'%')->get();
    return view('results', compact('settings', 'categories',
                                   'all_categories', 'posts', 'request'));
  }

  public function subscribe(Request $request)
  {
    $email = $request->email;
    Newsletter::subscribe($email);
    return redirect()->back()
      ->with(['subscribed' => 'You have subscribed to our newsletter.']);
  }
}
