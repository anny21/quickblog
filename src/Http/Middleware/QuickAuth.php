<?php

namespace Devanny\QuickBlog\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class QuickAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(\Auth::check()){
            return $next($request);

        }

        return redirect(route('post.index'))->with('error', 'Please login to complete request');
    }
}
