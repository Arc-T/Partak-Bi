<?php

namespace App\Http\Controllers\Company;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Utilities\CompanyUtility;

class BaseController extends Controller
{
    // keeps variable value in memory
    protected static $subdomain;

    // checks if subdomain hasn't been initialized and current value with current subdomain value.
    public function __construct(Request $request)
    {
        // dd(self::$subdomain);
        
        if(!isset(self::$subdomain) || self::$subdomain != $request->route('subdomain') ) self::$subdomain = $request->route('subdomain');

        view()->share('subdomain', self::$subdomain);

        CompanyUtility::isCompanyCachedInfo(self::$subdomain);
    }
}
