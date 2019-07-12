<?php

namespace App\Http\Middleware;

use Closure;

class CheckIfAluminiNotLoggedIn
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
        if(!\Session::get('alumini_id'))
        {
            return $next($request);    
        }
        else
        {
            \Session::flash('error-msg', 'You are already logged in');
            return redirect()->route('alumini-edit-get');
        }
    }
}
