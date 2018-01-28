<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
use App\Profile;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
  public function __construct()
  { $this->middleware('admin'); }

  public function index()
  {
    $users = User::orderBy('name')->get();
    return view('admin.users.index', compact('users'));
  }

  public function create()
  { return view('admin.users.create'); }

  public function store(Request $request)
  {
    $this->validate($request, [
      'name'     => 'required|string|max:255',
      'email'    => 'required|string|email|max:255|unique:users',
      'password' => 'required|string|min:6|confirmed',
    ]);
    $user = User::create([
      'name'     => $request->name,
      'email'    => $request->email,
      'password' => bcrypt($request->password)
    ]);
    $profile = Profile::create([
      'user_id' => $user->id,
      'avatar'  => "public/uploads/avatars/$user->id.jpg",
    ]);
    $file = new \SplFileInfo(base_path('default.jpg'));
    Storage::putFileAs('public/uploads/avatars', $file, "$user->id.jpg");
    return redirect()->route('users.index')
                     ->with(['success' => 'User successfully created.']);
  }

  public function destroy(User $user)
  {
    $user->delete();
    return redirect()->route('users.index')
                     ->with(['success' => $user->name.' has been (soft) deleted.']);
  }

  public function adminToggle(User $user)
  {
    $user->admin = !$user->admin;
    $user->save();
    return redirect()->back()
                     ->with(['success' => 'Admin status successfully toggled.']);
  }
}
