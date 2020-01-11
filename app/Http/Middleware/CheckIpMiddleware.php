<?php

namespace App\Http\Middleware;

use Closure;

class CheckIpMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public $whiteIps = ['192.168.43.252', '127.0.0.1'];
    public function handle($request, Closure $next)
    {
        if (in_array($request->ip(), $this->whiteIps)) {
            return response()->json(['your ip address not valid']);
        }
        return $next($request);
    }
}
