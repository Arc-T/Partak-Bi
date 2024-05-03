<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Company;

class CheckSubdomain
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */

    public function handle($request, Closure $next)
    {

        $subdomain = $request->route('subdomain');

        $allowedSubdomains = Company::where('Subdomain' , $subdomain)->exists();

        if (!$allowedSubdomains) {

            abort(404);
        }

        return $next($request);
    }
}
