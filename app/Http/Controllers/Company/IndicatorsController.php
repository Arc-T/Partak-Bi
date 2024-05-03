<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Classes\CompanyClass;
use App\Classes\IndicatorClass;
use Illuminate\Http\Request;

class IndicatorsController extends Controller
{

    protected $user;
    protected $subdomain;

    public function __construct(Request $request)
    {
        if (!isset($this->subdomain)) $this->subdomain = $request->route('subdomain');
    }

    public function show(Request $request)
    {

        $result          = IndicatorClass::apexchartGraphHandler($request);

        $view_details    = CompanyClass::get_company_view_details($this->subdomain);

        return view('companies.menu.indicators.result')->with([
            'common'        => $view_details,
            'graphs'        => $result,
            'graph_type'    => $request->graph_type
        ]);
    }
}
