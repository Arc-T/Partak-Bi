<?php

namespace App\Http\Controllers\Company;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Utilities\CompanyUtility;

class BaseController extends Controller
{
    public $subdomain = '';
    public function __construct(Request $request)
    {
        $this->subdomain = $request->route('subdomain');
        
        view()->share('subdomain', $this->subdomain);

        CompanyUtility::isCompanyCachedInfo($this->subdomain);
    }
}
