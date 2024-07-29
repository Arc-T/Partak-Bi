<?php

namespace App\Http\Controllers\User;

use App\Facades\IndicatorFacade;
use Hekmatinasser\Verta\Verta;
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
        $validation = $request->validate([
            'begin_date' => 'required',
            'end_date' => 'required',
            'report' => 'required|numeric',
            'graph' => 'required|numeric',
            'comment' => 'nullable|max|255'
        ]);

        $params = [
            'query_params' => []
        ];

        if ($request->has('province')) {
            $params['query_params'][0] = $request->province;
        } elseif ($request->has('city')) {
            $params['query_params'][0] = $request->city;
        } elseif ($request->has('mdf')) {
            $params['query_params'][0] = $request->mdf;
        }

        $params['query_params'][1] = Verta::parse($validation['begin_date'])->formatGregorian('Y-m-d');
        $params['query_params'][2] = Verta::parse($validation['end_date'])->formatGregorian('Y-m-d');

        $params['details']['route'] = $this->route;
        $params['details']['graph'] = $validation['graph'];
        $params['details']['report'] = $validation['report'];
        $params['details']['sub_route'] = $this->sub_route;
        $params['details']['subdomain'] = $this->subdomain;

        return IndicatorFacade::processCustomIndicatorRequest($params)
            ? redirect()->back()->with(['success' => 'نمودار با موفقیت ثبت گردید !', 'tab' => 2])
            : redirect()->back()->with(['error', 'در ثبت نمودار خطایی رخ داده است !', 'tab' => 2]);
    }
    public function show(): View
    {
        $t = new IndicatorService;

        // $is_saved = IndicatorFacade::processDailyIndicatorRequest();

        $general = IndicatorService::getDailyIndicatorGraphs($this->subdomain, $this->sub_route);

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
            'report_id' => 'required',
            'report_graph_id' => 'required'
        ]);

        return ReportService::removeReportGraph(intval($params['report_graph_id']))
            ? redirect()->back()->with(['success' => 'نمودار با موفقیت حذف گردید !', 'tab' => $params['report_id']])
            : redirect()->back()->with(['error' => 'در حذف نمودار خطایی رخ داده است !', 'tab' => $params['report_id']]);
    }
    public function update(Request $request): RedirectResponse
    {
        $params = $request->validate([
            'id' => 'required',
            'report_id' => 'required',
            'graph_title' => 'nullable',
            'graph_width' => 'nullable',
            'graph_height' => 'nullable'
        ]);

        return ReportService::updateReportGraph($params)
            ? redirect()->back()->with(['success' => 'نمودار با موفقیت آپدیت شد !', 'tab' => $params['report_id']])
            : redirect()->back()->with(['error' => 'در آپدیت نمودار خطایی رخ داده است !', 'tab' => $params['report_id']]);
    }
}
