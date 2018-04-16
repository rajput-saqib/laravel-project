<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;
use Closure;

use App\User;

class verifyUserByEmail
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

        $user = User::findOrFail(Auth::id());
        if(!$user) {
            Auth::logout();
            return redirect('login')->with('message', 'Please verify user (Middleware).');
        }
        return $next($request);
    }
}
