<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Utilities\CompanyUtility;

class BaseController extends Controller
{
    public $subdomain = '';
    public $route = '';
    public $sub_route = '';

    public function __construct()
    {
        $this->subdomain = Request()->subdomain;
        $this->route = Request()->route;
        $this->sub_route = Request()->sub_route;

        view()->share('subdomain', $this->subdomain);

        CompanyUtility::isCompanyCachedInfo($this->subdomain);
    }
}
