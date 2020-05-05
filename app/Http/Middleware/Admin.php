<?php

namespace App\Http\Middleware;

use App\User;
use Closure;
use Illuminate\Http\Response;

class Admin
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

        abort_unless(auth()->user()->role==User::ADMIN_ROLE , Response::HTTP_FORBIDDEN);

        return $next($request);
    }
}
