<?php

namespace Nordal\Http\Middleware;

use Closure;
use Sentinel;

class TeacherMiddleware
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
        if ( Sentinel::check() && Sentinel::getUser()->isTeacher() )
        {
            return $next($request);
        }

            return redirect('/login');

    }
}
