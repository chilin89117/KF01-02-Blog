<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
  public function __construct()
  { $this->middleware('admin'); }

  public function index()
  {
    $categories = Category::orderBy('name')->get();
    return view('admin.categories.index', compact('categories'));
  }

  public function store(Request $request)
  {
    $this->validate($request, [
      'name' => 'required|min:3'
    ]);
    Category::create([ 'name' => $request->name ]);
    return redirect()->route('categories.index')
                     ->with(['success' => 'Category successfully created.']);
  }

  public function edit(Category $category)
  { return view('admin.categories.edit', compact('category')); }

  public function update(Request $request, Category $category)
  {
    $this->validate($request, [
      'name' => 'required|min:3'
    ]);
    $category->update(['name' => $request->name]);
    return redirect()->route('categories.index')
                     ->with(['success' => 'Category successfully updated!']);
  }

  public function destroy(Category $category)
  {
    if($category->posts->count() > 0) {
      return back()->with([
        'error' => 'Delete failed. There are posts in the "'.$category->name.'" category.']);
    } else {
      $category->delete();
      return redirect()->route('categories.index')
                       ->with(['success' => 'Category successfully deleted!']);
    }
  }
}
