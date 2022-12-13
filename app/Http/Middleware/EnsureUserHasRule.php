<?php

namespace App\Http\Middleware;

use Auth;
use Closure;
use Illuminate\Http\Request;

class EnsureUserHasRule
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $role)
    {
        //$check is  variable that check if the role has char | 

        $user = Auth::user();
        $check = str_contains($role, '|');
        if ($check) {
            $roles = explode('|', $role);
            for ($i = 0; $i < sizeof($roles); $i++) {
                if ($user->hasRole($roles[$i])) {
                    return $next($request);
                    break;
                }
            }
            return sendErrorResponse(null, __('auth.not_authorized'));
        }

        if (!$user->hasRole($role)) {
            return sendErrorResponse(null, __('auth.not_authorized'));
        }
        return $next($request);
    }
}
