<?php

namespace App\Http\Middleware;

use Closure;

class OnlyAdminAllowed
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
      if ($request->name != 'admin') {
        return response('You are not allowed to acces!', 403);
        
      }

      $response = $next($request);

      return $response;
    }
}
