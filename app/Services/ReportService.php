<?php

namespace App\Services;

use Exception;
use App\Models\Report;
use App\Models\ReportGraph;
use App\Facades\IndicatorFacade;

class ReportService
{
    public static function getAllReports(): array
    {
        return Report::all()->toArray();
    }
    public static function getActiveReports(): array
    {
        return Report::where('active', '1')->get()->toArray();
    }
    public static function saveReport(string $subdomain, string $route, $params): bool
    {

        $company_id = CompanyService::getCompanyIdBySubdomain($subdomain);

        $indicator_id = IndicatorService::getIndicatorIdByRoute($route);

        try {

            $report = new Report;
            $report->title = $params->report_title;
            $report->active = $params->report_active;
            $report->company_id = $company_id;
            $report->indicator_id = $indicator_id;
            $report->comment = $params->report_comment;
            $report->save();

            return true;

        } catch (Exception $exception) {
            // TODO log
            return false;
        }
    }
    public static function removeReport(int $id): bool
    {
        try {

            Report::find($id)->delete();

            return true;

        } catch (Exception $exception) {

            //TODO remember to remove
            dd($exception);
            return false;
        }
    }
    public static function saveReportGraph(array $params): bool
    {
        $data = IndicatorFacade::processIndicatorRequest($params);

        if (empty($data))
            return false;

        try {

            $report_graph = new ReportGraph;
            $report_graph->report_id = $params['report'];
            $report_graph->graph_id = $params['graph'];
            $report_graph->data = json_encode($data);
            $report_graph->size = 'B';
            if (isset($params['comment']))
                $report_graph->comment = $params['comment'];

            return $report_graph->save();

        } catch (Exception $exception) {
            //TODO remember to remove
            dd($exception);
            return false;
        }
    }
    public static function removeReportGraph(int $id): bool
    {
        try {

            return ReportGraph::find($id)->delete();

        } catch (Exception $exception) {

            //TODO remember to remove
            dd($exception);
            return false;
        }
    }
    public static function updateReportGraph(array $params): bool
    {
        try {

            $graph = ReportGraph::find(intval($params['id']));

            $graph->title = $params['graph_title'];
            $graph->size = $params['graph_size'];

            return $graph->save();

        } catch (Exception $exception) {

            dd($exception);
            return false;
        }
    }
}