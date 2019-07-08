<?php

namespace App\Http\Middleware;

use Closure;

class CheckIfAlumini
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
        $status = $this->check(\Auth::user()->id);
        return $next($request);
    }

    public function check($user_id)
    {
        return (\App\User::where('id', $user_id)->first()->group_id == ALUMINI) ? true : false;
    }
}
