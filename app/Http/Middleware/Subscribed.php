<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use App\User;

class Subscribed
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
        $user = Auth::user();
        if (($user == null || $user->plan == null || $user->membership == null || !$user->membership->isValid()) && !superAdmin()) {
          return errorTo('You need to have an active subscription to access the page.', route('home'));
        }
        return $next($request);
    }
}
