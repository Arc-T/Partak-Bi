<?php

namespace App\Http\Controllers\User;

use App\Services\ReportService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Services\IndicatorService;

class IndicatorController extends BaseController
{
    public function store(Request $request) : RedirectResponse
    {
        $params = $request->validate([
            'report' =>'required|numeric',
            'graph' =>'required|numeric',
            'comment' => 'nullable|max|255'
        ]);

        return ReportService::saveReportDetails($params) ? redirect()->back()->with('success', 'نمودار با موفقیت ثبت گردید !') : redirect()->back()->with('error', 'در ثبت نمودار خطایی رخ داده است !');
    }

    public function show():View
    {
        $t = new IndicatorService;

        $general = $t->processIndicatorDailyGraphs(Request()->subdomain, Request()->route);

        $graphs_list = $t->getIndicatorGraphsByRoute(Request()->route);

        $reports =  $t->getIndicatorReports(Request()->subdomain, Request()->route);

        return view('user.dashboard.customers.show', [
            'general' => $general,
            'graphs_list' => $graphs_list,
            'reports' => $reports
        ]);
    }
}
