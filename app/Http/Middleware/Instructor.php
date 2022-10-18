<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class Instructor
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse) $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        /**
         * role 2 instructor
         * only instructor can access instructor panel
         */


        if (auth()->user()->type == 2 && auth()->user()->instructor->status == 1) {
            return $next($request);
        } else {

            abort('403');
        }


    }
}
