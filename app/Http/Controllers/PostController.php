<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\Tag;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
  public function index()
  {
    if($c = request()['cat']) {
      $cat = Category::find($c);
      $posts = $cat->posts()->latest()->paginate(10);
      $heading = " in category << $cat->name >>";
      $type = ['cat' => $cat->id];
    } elseif($t = request()['tag']) {
      $tag = Tag::find($t);
      $posts = $tag->posts()->latest()->paginate(10);
      $heading = " with tag << $tag->tag >>";
      $type = ['tag' => $tag->id];
    } else {
      $posts = Post::latest()->paginate(10);
      $heading = '';
      $type = [];
    }
     return view('admin.posts.index', compact('posts', 'heading', 'type'));
  }

  public function create()
  {
    $categories = Category::orderBy('name')->get();
    $tags = Tag::orderBy('tag')->get();
    if($categories->count() == 0) {
      return redirect()->route('categories.create')
                       ->with(['info' => 'Please create some categories first.']);
    } else {
      return view('admin.posts.create', compact('categories', 'tags'));
    }
  }

  public function store(Request $request)
  {
    $this->validate($request, [
      'title'       => 'required|max:100',
      'featured'    => 'required|image',
      'content'     => 'required',
      'category_id' => 'required'
    ]);
    $featured = $request->featured;
    // Append timestamp to filename to avoid duplicate names
    $img_name = time().$featured->getClientOriginalName();
    // Copy file to "storage/app/public/uploads/posts" folder
    $path = $request->file('featured')->storeAs('public/uploads/posts', $img_name);
    $post = Post::create([
      'user_id'     => auth()->id(),
      'title'       => $request->title,
      'featured'    => $path,
      'content'     => $request->content,
      'category_id' => $request->category_id,
      'slug'        => str_slug($request->title)
    ]);
    $post->tags()->attach($request->tags);
    return redirect()->route('posts.index')
                     ->with(['success' => 'Post successfully created.']);
  }

  public function edit(Post $post)
  {
    $categories = Category::all();
    $tags = Tag::orderBy('tag')->get();
    return view('admin.posts.edit', compact('post', 'categories', 'tags'));
  }

  public function update(Request $request, Post $post)
  {
    $this->validate($request, [
      'title'    => 'required|max:100',
      'content'  => 'required'
    ]);
    if($request->hasFile('featured')) {
      $old_img = str_replace_first('storage', 'public', $post->featured);
      Storage::delete($old_img);
      $featured = $request->featured;
      $img_name = time().$featured->getClientOriginalName();
      $path = $request->file('featured')->storeAs('public/uploads/posts', $img_name);
      $post->featured = $path;
    }
    $post->title = $request->title;
    $post->content = $request->content;
    $post->category_id = $request->category_id;
    $post->save();
    $post->tags()->sync($request->tags);
    return redirect()->route('posts.index')
                     ->with(['success' => 'Post successfully updated.']);
  }

  public function destroy(Post $post)
  {
    $post->delete();  // softDelete
    return redirect()->route('posts.index')
                     ->with(['success' => 'Post successfully trashed.']);
  }

  public function trashedIndex() 
  {
    $tPosts = Post::onlyTrashed()->orderBy('deleted_at', 'desc')->get();
    return view('admin.posts.trashed', compact('tPosts'));
  }

  public function restorePost($id)
  {
    $post = Post::onlyTrashed()->where('id', $id);
    $post->restore();
    return redirect()->route('posts.index')
                     ->with(['success' => 'Post successfully restored.']);
  }

  public function permDelete($id)
  {
    $post = Post::onlyTrashed()->find($id);
    $old_img = str_replace_first('storage', 'public', $post->featured);
    Storage::delete($old_img);
    $post->forceDelete();
    return redirect()->route('posts.trashed')
                     ->with(['success' => 'Post permanently deleted.']);
  }
}
