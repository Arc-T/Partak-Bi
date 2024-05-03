<?php

namespace App\Http\Middleware;

use App\Models\Company;
use App\Models\User;
use Closure;
use Illuminate\Http\Request;

class AuthenticateCompanyUser
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
        $user = decrypt($request->session()->get('user_session'));

        $subdomain = Company::where('ID' , User::where('ID' , $user)->value('CompanyID'))->value('Subdomain');

        if($subdomain != $request->route('subdomain')) {

            dd("HEEHEH");
        }

        return $next($request);
    }
}
