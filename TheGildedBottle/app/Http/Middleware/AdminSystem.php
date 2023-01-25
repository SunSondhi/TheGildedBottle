<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Stmt\ElseIf_;

class AdminSystem
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
            //check if role is 1 as admin or 0 to normal user
            if (Auth::user()->role == '1') {
                $admin = True;
                return $next($request);
            }elseif(Auth::user()->role=='2'){
                return redirect('home')->with('message', 'Access denied: Error, You are not an Administrator');
            } else {
                return redirect('home')->with('message', 'Access denied: Error, You are not an Administrator');
            }
        } else {
            return redirect('login')->with('status', 'Access denied: Error, Access the website with correct credentials');
        }

        return $next($request);
    }
}
