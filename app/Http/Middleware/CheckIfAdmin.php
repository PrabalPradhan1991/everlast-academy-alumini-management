<?php

namespace App\Http\Middleware;

use Closure;

class CheckIfAdmin
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
        if($status)
        {
            return $next($request);    
        }
        else
        {
            \App::Abort(403);
        }
        
    }

    public function check($user_id)
    {
        return (\App\User::where('id', $user_id)->first()->group_id == ADMIN) ? true : false;
    }
}
