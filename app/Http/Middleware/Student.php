<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class Student
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
         * role 1 admin
         * role 2 instructor
         * role 3 student
         */

        if (auth()->user()->type == 2 || auth()->user()->type == 3) {

            if (auth()->user()->type == 2) {
                if (auth()->user()->instructor->status == 1) {
                    return $next($request);
                } else {
                    abort('403');
                }
            }

            if (auth()->user()->type == 3) {

                $student = auth()->user()->student;
                if ($student) {
                    if (auth()->user()->student->status == 1) {
                        return $next($request);
                    } else {
                        abort('403');
                    }
                } else {
                    return $next($request);
                }


            }


        } else {

            abort('403');
        }


    }
}
