<?php

namespace App\Http\Controllers\User;

use App\Services\CompanyService;
use App\Services\GraphService;
use App\Services\ReportService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Services\IndicatorService;

class IndicatorController extends BaseController
{
    public function store(Request $request): RedirectResponse
    {
        $params = $request->validate([
            'report' => 'required|numeric',
            'graph' => 'required|numeric',
            'comment' => 'nullable|max|255'
        ]);

        return ReportService::saveReportDetails($params) ? redirect()->back()->with('success', 'نمودار با موفقیت ثبت گردید !') : redirect()->back()->with('error', 'در ثبت نمودار خطایی رخ داده است !');
    }

    public function show(): View
    {
        $t = new IndicatorService;

        $general = $t->processIndicatorDailyGraphs(Request()->subdomain, Request()->route);

        $graphs_list = $t->getIndicatorGraphsByRoute(Request()->route);

        $reports = $t->getIndicatorReports(Request()->subdomain, Request()->route);

        $inputs = GraphService::getGraphInputsByIndicatorId(Request()->route);

        // $url = CompanyService::getCompanyApiBySubdomain(Request()->subdomain);
        $url ='https://178.173.128.10/api/BI/rest.php';

        return view('user.dashboard.indicators.show', [
            'url' => $url,
            'inputs' => $inputs,
            'general' => $general,
            'reports' => $reports,
            'graphs_list' => $graphs_list
        ]);
    }
}
