<?php

namespace App\Facades;

use App\Services\IndicatorService;
use Hekmatinasser\Verta\Verta;

class IndicatorFacade
{
    /*
     * Process indicator request in 3 steps
     * 1st: send request to CRM
     * 2nd: clean response data
     * 3rd: assign data to charts
     */
    public static function processIndicatorRequest(array $params): array
    {
        $indicator = IndicatorService::getIndicatorDetailsByRoute($params['route']);

        if (empty($indicator)) return [];

        $query_params = [
            "subdomain" => $params['subdomain'],
            "method" => "indicator",
            "data" => [
                "IndicatorRef" => $indicator['id'],
                "BeginDate" => Verta::parse($params['begin_date'] . '00:00:01')->formatGregorian('Y-m-d H:i:s'), //2022-08-15 00:00:00,
                "EndDate" => Verta::parse($params['end_date'] . ' 23:59:59')->formatGregorian('Y-m-d H:i:s')
            ],
        ];

        //$response = RequestService::sendRequest($query_params);

        return $filtered_data = IndicatorService::filterDataResponse(null);

        /**
         * * Should Assign Data base on chart types
         */
        // $charts = ApexChart::commonChartDataSort($filtered_data);

        // return $charts;


    }

}