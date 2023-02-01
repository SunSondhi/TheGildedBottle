<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class isEmployee
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $admin = False;
        if (Auth::check()) {
            //if role is 1 and 2 then its a admin and an employee, otherwise do not give access.
            if (Auth::user()->role == '1') {
                $admin = True;
                return $next($request);
            }
            elseif(Auth::user()->role == '2'){
                return $next($request);
            }
            else {
                return redirect('home')->with('message', 'Access denied: Error, You are not an Administrator nor an employee');
            }
        } else {
            return redirect('login')->with('status', 'Access denied: Error, Access the website with correct credentials');
        }
        return $next($request);
    }
}
