<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(
      $request,
      Closure $next,
      $role1 = false,
      $role2 = false,
      $role3 = false
    )
    {
      if (Auth::check()) {

        if ( $role1 && $request->user()->hasRole( trim( $role1 ) ) ) {
          return $next($request);
        }
        if ( $role2 && $request->user()->hasRole( trim( $role2 ) ) ) {
          return $next($request);
        }
        if ( $role3 && $request->user()->hasRole( trim( $role3 ) ) ) {
          return $next($request);
        }

        return abort(404);
        // return redirect()->route('not_allowed');

      }


      return redirect()->route('login');
    }
}
