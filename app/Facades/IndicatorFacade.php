<?php

namespace App\Facades;

use App\Services\CompanyService;
use App\Services\IndicatorService;
use App\Services\RequestService;
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

        if (empty($indicator))
            return [];

        $api_url = CompanyService::getCompanyApiUrlBySubdomain($params['subdomain']);

        $query_params = [
            "method" => "indicator",
            "data" => [
                "IndicatorRef" => $indicator['id'],
                "CityRef" => $params['location'],
                "BeginDate" => Verta::parse($params['begin_date'] . '00:00:01')->formatGregorian('Y-m-d H:i:s'), //2022-08-15 00:00:00,
                "EndDate" => Verta::parse($params['end_date'] . ' 23:59:59')->formatGregorian('Y-m-d H:i:s')
            ],
        ];

        $response = RequestService::sendRequest($query_params, $api_url);

        return IndicatorService::filterDataResponse($response);

        /**
         * * Should Assign Data base on chart types
         */
        // $charts = ApexChart::commonChartDataSort($filtered_data);

        // return $charts;
    }

}