<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $subdomain = Company::where('id' , User::where('id' , Auth::user()->id)->value('company_id'))->value('subdomain');

        if($subdomain != $request->route('subdomain')) {

            return redirect()->back()->with('error','دسترسی امکان پذیر نمی باشد !');
        }

        return $next($request);
    }
}
