<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TeamPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!empty(auth()->user())) {
            setPermissionsTeamId(session('kelas_id'));
        }
        // other custom ways to get kelas_id
        /*if(!empty(auth('api')->user())){
            // `getTeamIdFromToken()` example of custom method for getting the set kelas_id 
            setPermissionsTeamId(auth('api')->user()->getTeamIdFromToken());
        }*/

        return $next($request);
    }
}
