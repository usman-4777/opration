<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;

class employ
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
        return $next($request);

    }

    /**
     * Get User Assoicated with the post
     * @return mixed
     */
    //public  function  user() {
      //  return $this->hasMany(User::class, 'user_id');
    //}

    /**
     * Get all posts related to user
     * @return mixed
     */
    //public function  posts() {
      //  return $this->hasMany(User::class, 'user_id');
    //}
}
