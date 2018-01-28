<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Tag;

class TagController extends Controller
{
  public function __construct()
  { $this->middleware('admin'); }

  public function index()
  {
    $tags = Tag::orderBy('tag')->get();
    return view('admin.tags.index', compact('tags'));
  }

  public function store(Request $request)
  {
    $this->validate($request, ['tag' => 'required:min3']);
    Tag::create(['tag' => $request->tag]);
    return redirect()->route('tags.index')
                     ->with(['success' => 'Tag successfully created.']);
  }

  public function edit(Tag $tag)
  { return view('admin.tags.edit', compact('tag')); }

  public function update(Request $request, Tag $tag)
  {
    $this->validate($request, ['tag' => 'required|min:3']);
    $tag->tag = $request->tag;
    $tag->save();
    return redirect()->route('tags.index')
                     ->with(['success' => 'Tag successfully updated.']);
  }

  public function destroy(Tag $tag)
  {
    $tag->posts()->detach();
    $tag->delete();
    return redirect()->back()
                     ->with(['success' => 'Tag successfully deleted.']);
  }
}
