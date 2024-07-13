<?php

namespace App\Http\Controllers\User;

use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Services\GraphService;
use App\Services\ReportService;
use App\Services\IndicatorService;

class IndicatorController extends BaseController
{
    public function store(Request $request): RedirectResponse
    {
        $params = $request->validate([
            'begin_date' => 'required',
            'end_date' => 'required',
            'report' => 'required|numeric',
            'graph' => 'required|numeric',
            'comment' => 'nullable|max|255'
        ]);

        $params['route'] = $this->route;
        $params['sub_route'] = $this->sub_route;
        $params['subdomain'] = $this->subdomain;

        return ReportService::saveReportGraph($params) ? redirect()->back()->with('success', 'نمودار با موفقیت ثبت گردید !') : redirect()->back()->with('error', 'در ثبت نمودار خطایی رخ داده است !');
    }
    public function show(): View
    {
        $t = new IndicatorService;

        $general = $t->processIndicatorDailyGraphs($this->subdomain, $this->sub_route);

        $graphs_list = $t->getIndicatorGraphsByRoute($this->sub_route);

        $reports = $t->getIndicatorReports($this->subdomain, $this->sub_route);

        $inputs = GraphService::getGraphInputsByIndicatorId($this->sub_route);

        // $url = CompanyService::getCompanyApiBySubdomain(Request()->subdomain);
        $url = 'https://178.173.128.10/api/BI/rest.php';

        return view('user.dashboard.indicators.show', [
            'url' => $url,
            'inputs' => $inputs,
            'general' => $general,
            'reports' => $reports,
            'graphs_list' => $graphs_list
        ]);
    }
    public function destroy(Request $request): RedirectResponse
    {
        $params = $request->validate([
            'report_id' => 'required'
        ]);
        
        return ReportService::removeReportGraph($params) ? redirect()->back()->with('success', 'نمودار با موفقیت حذف گردید !') : redirect()->back()->with('error', 'در حذف نمودار خطایی رخ داده است !');
    }
}
