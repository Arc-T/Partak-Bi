<?php

namespace App\Http\Services;

use App\Http\Utilities\CompanyUtility;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Http;

class IndicatorService
{
    private object $response;
    /*
    * Process indicator request in 3 steps
    * 1st: send request to CRM 
    * 2nd: clean response data
    * 3rd: assign data to charts
    */
    public function processIndicatorRequest(array $params = null): array
    {
        // $data = $this->sendRequest($params);

        $filtered_data = $this->filterDataResponse([], []);

        $charts = $this->assignDataToChart($filtered_data, ['type' => 'common']);

        return $filtered_data;
    }

    private function sendRequest(array $params = null): array
    {
        $query_params = [
            "method" => "indicator",
            "data" => [
                "IndicatorRef" => "1",
                "BeginDate" => "2024-05-13",
                "EndDate" => "2024-05-13"
            ]
        ];

        $company_url = CompanyUtility::getCompanyApiUrl($params['company']);

        /*
        ! Curls error should be handled 
        */
        $this->response = Http::withBody(json_encode($query_params), 'application/json')
            ->get($company_url);

        // http code above 200 and less than 300
        if ($this->response->successful()) {
            $data = $this->response->json();
            return $data['Result'];
        }

        return [];
    }

    /*
    * Filters response data of API.
    */
    private function filterDataResponse(array $data, array $params): array
    {
        $data2 = [
            'Dates' => [
                '2014-02-05' => [
                    'Provinces' => [
                        'Isfahan' => [
                            'Status' => [
                                'A' => 30,
                                'B' => 20,
                                'C' => 22
                            ],
                        ],
                        'Tehran' => [
                            'Status' => [
                                'A' => 80,
                                'B' => 330,
                                'C' => 222
                            ],
                        ],
                    ],
                ],
            ],
        ];

        // Provinces, Cities , Mdfs
        $location_filter = array_key_first(array_values($data2['Dates'])[0]);

        // Status
        $indicator_filter = array_key_first(array_values(array_values($data2['Dates'])[0][$location_filter])[0]);

        $dates = array_keys($data2['Dates']);

        $locations = array_keys(array_values($data2['Dates'])[0][$location_filter]);

        $indicators = [];

        foreach ($dates as $date) {

            foreach ($locations as $location) {

                $indicator_result = $data2['Dates'][$date][$location_filter][$location][$indicator_filter];

                foreach ($indicator_result as $indicator_key => $indicator_value) {

                    $has_key = array_search($indicator_key, array_column($indicators, 'name'));

                    if ($has_key === false) {
                        $indicators[] = [
                            'name' => $indicator_key,
                            'data' => [$indicator_value]
                        ];
                    } else {
                        $indicators[$has_key]['data'][] = $indicator_value;
                    }
                }
            }
        }

        return [
            'dates' => $dates,
            'locations' => $locations,
            'indicators' => $indicators
        ];
    }

    /*
    * Based on charts, assign filtered data to charts
    */
    private function assignDataToChart(array $filtered_data, array $charts): array
    {
        return App::call(
            [new \App\Http\Services\ApexChart, 'commonChartDataSort'],
            ['filtered_data' => $filtered_data]
        );
    }
}
