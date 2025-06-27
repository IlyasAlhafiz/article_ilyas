<?php

namespace App\Http\Middleware;
use Auth;
use Closure;
use Illuminate\Http\Request;

class isAdmin
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
        if ($request->routeIs('home.*','artikel.*','kategori.*','komentar*','penulis*') && Auth::user()->is_admin !==1) {
            abort(404, 'NOT FOUND');
        }

        return $next($request);
    }
}
