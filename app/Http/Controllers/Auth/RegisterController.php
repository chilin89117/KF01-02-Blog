<?php
namespace App\Http\Controllers\Auth;
use App\User;
use App\Profile;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Storage;

class RegisterController extends Controller
{
  use RegistersUsers;

  protected $redirectTo = '/login';

  public function __construct()
  { $this->middleware('guest'); }

  protected function validator(array $data)
  {
    return Validator::make($data, [
      'name' => 'required|string|max:255',
      'email' => 'required|string|email|max:255|unique:users',
      'password' => 'required|string|min:6|confirmed',
    ]);
  }

  protected function create(array $data)
  {
    return User::create([
      'name' => $data['name'],
      'email' => $data['email'],
      'password' => bcrypt($data['password']),
    ]);
  }

  // Function overrides Illuminate\Foundation\Auth\RegistersUsers
  public function register(Request $request)
    {
      $this->validator($request->all())->validate();
      event(new Registered($user = $this->create($request->all())));
      // $this->guard()->login($user);
      return $this->registered($request, $user)
                      ?: redirect($this->redirectPath());
    }

  // Function overrides Illuminate\Foundation\Auth\RegistersUsers
  protected function registered(Request $request, $user)
  {
    $profile = Profile::create([
      'user_id' => $user->id,
      'avatar'  => "public/uploads/avatars/$user->id.jpg",
    ]);
    $file = new \SplFileInfo(base_path('default.jpg'));
    Storage::putFileAs('public/uploads/avatars', $file, "$user->id.jpg");
  }
}
