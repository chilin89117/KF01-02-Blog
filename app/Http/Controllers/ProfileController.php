<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
  public function editProfile(User $user)
  { 
    if($user->id == auth()->id())
    {
      return view('admin.users.profile', compact('user'));
    } else {
      return redirect()->route('dashboard')
        ->with(['error' => "Cannot edit someone else's profile."]);
    }
  }

  public function saveProfile(Request $request, User $user)
  {
    $this->validate($request, [
      'name' => 'required|string|max:255',
    ]);
    $user->name = $request->name;
    // Profile info start out with null values when created
    if(!is_null($request->password)) {
      $this->validate($request, ['password' => 'required|string|min:6|confirmed']);
      $user->password = bcrypt($request->password);
    }
    if($request->hasFile('avatar')) {
      $old_img = str_replace_first('storage', 'public', $user->profile->avatar);
      Storage::delete($old_img);
      $avatar = $request->avatar;
      $img_name = time().$avatar->getClientOriginalName();
      $path = $request->file('avatar')->storeAs('public/uploads/avatars', $img_name);
      $user->profile->avatar = $path;
    }
    if(!is_null($request->facebook)) {
      $this->validate($request, ['facebook' => 'required|string|url']);
      $user->profile->facebook = $request->facebook;
    }
    if(!is_null($request->youtube)) {
      $this->validate($request, ['youtube' => 'required|string|url']);
      $user->profile->youtube = $request->youtube;
    }
    if(!is_null($request->about)) {
      $this->validate($request, ['about' => 'required|string|max:512']);
      $user->profile->about = $request->about;
    }
    if(!is_null($request->title)) {
      $this->validate($request, ['title' => 'required|string']);
      $user->profile->title = $request->title;
    }
    $user->save();
    $user->profile->save();
    return redirect()->route('dashboard')
                     ->with(['success' => 'Profile successfully updated.']);
  }
}
