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
    public static function saveReportGraph(array $inputs, string $filtered_data): bool
    {
        try {

            $report_graph = new ReportGraph;
            $report_graph->report_id = $inputs['report'];
            $report_graph->graph_id = $inputs['graph'];
            $report_graph->width = 12;
            $report_graph->height = 350;
            $report_graph->data = $filtered_data;
            if (isset($inputs['comment']))
                $report_graph->comment = $inputs['comment'];

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

            if (!is_null($params['graph_title']))
                $graph->title = $params['graph_title'];

            $graph->width = $params['graph_width'];
            $graph->height = $params['graph_height'];
            
            return $graph->save();

        } catch (Exception $exception) {

            dd($exception);
            return false;
        }
    }
}