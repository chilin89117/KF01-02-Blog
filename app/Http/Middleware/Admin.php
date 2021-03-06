<?php
namespace App\Http\Middleware;
use Closure;

class Admin
{
  public function handle($request, Closure $next)
  {
    if(!auth()->user()->admin) {
      return redirect()->back()
                       ->with(['error' => 'You do not have permission for this action.']);
    }
    return $next($request);
  }
}
