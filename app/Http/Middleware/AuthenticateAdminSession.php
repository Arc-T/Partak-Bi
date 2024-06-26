<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticateAdminSession
{

    public function handle(Request $request, Closure $next)
    {
        if (!Auth::user() || Auth::user()->id != 1) {

            return redirect()->route('admin.login')->with('error', 'ابتدا باید وارد سایت شوید !');
        }

        return $next($request);
    }
}
