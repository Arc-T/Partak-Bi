<?php

namespace App\Http\Services;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Http;

class CompanyService
{
    private object $response;

    public function processIndicator(array $params = null): array
    {
        $data = $this->requestIndicator($params);

        $filtered_data = $this->filterIndicatorData($data,['charts' => 'common' , 'filters' => ['StatusName','Ind_Type']]);

        return $filtered_data;
    }

    private function requestIndicator(array $params = null): array
    {
        $query_params = [
            "method" => "indicator",
            "data" => [
                "IndicatorRef" => "1",
                "BeginDate" => "2024-05-13",
                "EndDate" => "2024-05-13"
            ]
        ];

        /*
        ! Curls error should be handled 
        */
        $this->response = Http::withBody(json_encode($query_params), 'application/json')
            ->get("https://user.hamyar.net/api/BI/rest.php");

        // http code above 200 and less than 300
        if ($this->response->successful()) {
            $data = $this->response->json();
            return $data['Result'];
        }

        return [];
    }

    private function filterIndicatorData(array $data, array $params): array
    {
        switch ($params['charts']) {
            case 'common':
                return App::call(
                    [new \App\Http\Services\ApexChart, 'pieChartDataSort'],
                    ['data' => $data, 'filters' => $params['filters']]
                );
                break;

            default:
                return [];
        }
    }
}
