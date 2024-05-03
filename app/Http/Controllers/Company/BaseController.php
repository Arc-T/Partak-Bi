<?php

namespace App\Http\Controllers\Company;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BaseController extends Controller
{
    // keeps variable value in memory
    protected static $subdomain;

    // checks if subdomain hasn't been initialized and current value with current subdomain value.
    public function __construct(Request $request)
    {
        if(!isset(self::$subdomain) && self::$subdomain != $request->route('subdomain') ) self::$subdomain = $request->route('subdomain');

        view()->share('subdomain', self::$subdomain);
    }
}
