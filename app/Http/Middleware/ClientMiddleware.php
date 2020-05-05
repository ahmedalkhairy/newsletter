<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Response;
use App\User;
class ClientMiddleware
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
        abort_unless(auth()->user()->role == User::CLINET_ROLE , Response::HTTP_FORBIDDEN);
        
        return $next($request);
    }
}
