<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role, $permission = null): Response
    {
        $userRoles = $request->user()?->roles?->pluck('slug')->toArray();
        if ($userRoles == null) {
            return redirect()->route('logout');
        }
        $role = explode('|', $role);
        if (empty(array_intersect($role, $userRoles))) {
            abort(401);
        }
        if ($permission !== null && !auth()->user()->can($permission)) {
            abort(401);
        }

        return $next($request);
    }
}
