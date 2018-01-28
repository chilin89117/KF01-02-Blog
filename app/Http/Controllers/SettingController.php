<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Setting;

class SettingController extends Controller
{
  public function __construct()
  { $this->middleware('admin'); }

  public function edit()
  {
    $settings = Setting::first();
    return view('admin.settings.settings', compact('settings'));
  }

  public function update(Request $request, Setting $settings)
  {
    $this->validate($request, [
      'sitename'       => 'required|min:3|max:100',
      'contactphone'   => 'required',
      'contactemail'   => 'required|email',
      'contactaddress' => 'required|max:255'
    ]);
    $settings->site_name       = $request->sitename;
    $settings->contact_phone   = $request->contactphone;
    $settings->contact_email   = $request->contactemail;
    $settings->contact_address = $request->contactaddress;
    $settings->update();
    return redirect()->route('dashboard')
                     ->with(['success' => 'Settings successfully updated.']);
  }
}
