<?php

namespace App\Http\Middleware;

use App\Http\Composer\MenuComposer;
use Closure;
use Illuminate\Support\Facades\Auth;

class RoleCheckMiddleware
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
        $myRoutes = array_column(MenuComposer::$template[Auth::user()->role],'href');
        $myRoutesSubMenu = collect(array_column(MenuComposer::$template[Auth::user()->role],'submenu'))->flatten(1)->map->href->toArray();
        $availableRoutes = array_merge($myRoutes,$myRoutesSubMenu);
        $currentRoute = $request->route()->getName();
        if(in_array($currentRoute,$availableRoutes)) return $next($request);
        Auth::logout(); return redirect()->route('login');
    }
}
