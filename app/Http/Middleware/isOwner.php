<?php
namespace App\Http\Middleware;
use Closure;
use Auth;
class isOwner
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::check() && Auth::user()->level == 1) {
            return redirect()->route('admin');            
        }
        elseif (Auth::check() && Auth::user()->level == 4) {
            return $next($request); 
        }
        elseif (Auth::check() && Auth::user()->level == 3) {
            return redirect()->route('kasir');
        }
        elseif (Auth::check() && Auth::user()->level == 2) {
            return redirect()->route('waiter');
        }
        else {
            return redirect()->route('login');
        }
    }
}
