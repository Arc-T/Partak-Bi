<?php

namespace App\Facades;

use App\Services\CompanyService;
use App\Services\IndicatorService;
use App\Services\ReportService;
use App\Services\RequestService;
use Illuminate\Support\Facades\DB;

class IndicatorFacade
{
    public static function processCustomIndicatorRequest(array $params): bool
    {
        $indicator_id = IndicatorService::getIndicatorIdByRoute($params['details']['sub_route']);

        $api_url = CompanyService::getCompanyApiUrlBySubdomain($params['details']['subdomain']);

        $query_params = RequestService::createRequestParams($params['query_params'], $indicator_id, false);

        $response = RequestService::sendRequest($query_params, $api_url);
        /**
         * TODO: check result
         */
        $filtered_data = IndicatorService::filterDataResponse($response);

        /**
         * TODO: check result
         */
        return ReportService::saveReportGraph($params['details'], json_encode($filtered_data));

    }

    public static function processDailyIndicatorRequest(): bool
    {

        /*
         *? This query gets result from bottom to top ......
         */

        $query = DB::select('SELECT a.id,a.params, a.indicator_id,
                                    b.api
                             FROM indicators_daily_graphs AS a, companies AS b
                             WHERE a.company_id = b.id');

        foreach ($query as $row) {

            $query_params = RequestService::createRequestParams(explode(',', $row->params), $row->indicator_id, true);

            $response = RequestService::sendRequest($query_params, $row->api);

            $filtered_data = IndicatorService::filterDataResponse($response);

            /*
             * Should log if successful or not
             */
            $is_saved = IndicatorService::saveDailyIndicatorGraph(json_encode($filtered_data), $row->id);
        }

        return true;

    }
    public static function getDailyIndicatorGraphs(array $params): array
    {
        $indicator_id = IndicatorService::getIndicatorIdByRoute($params['route']);

        if (empty($indicator))
            return [];

        $company_id = CompanyService::getCompanyIdBySubdomain($params['subdomain']);

        $daily_graphs = DB::select('SELECT *
                    FROM indicators_daily_graph
                    WHERE indicator_id = ?
                    AND  company_id = ?', [$indicator_id, $company_id]);

        /*
         * LOG & ERROR HANDLE
         */
        return $daily_graphs;
    }
}