<?php

namespace App\Services;

use App\Models\Indicator;
use App\Models\Report;
use App\Utilities\CompanyUtility;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
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
    public function processIndicatorCustomRequest(array $params = null): array
    {
        // $data = $this->sendRequest($params);

        $indicator_id = $this->getIndicatorIdByRoute($params['route']);

        $graph_object = new GraphService;

        $graph_id = $graph_object->getGraphIdByName($params['graph']);

        $params = $this->getIndicatorGraphInputs($indicator_id, $graph_id);

        $filtered_data = $this->filterDataResponse([]);

        $charts = $this->assignDataToChart($filtered_data, ['type' => 'common']);

        return $filtered_data;
    }
    public function processIndicatorDailyGraphs(string $subdomain, string $route): array
    {
        $indicator = $this->getIndicatorDetailsByRoute($route);

        $date = date('d.m.Y', strtotime("-1 days"));

        $params = [
            "subdomain" => $subdomain,
            "method" => "indicator",
            "data" => [
                "IndicatorRef" => $indicator['parent_id'],
                "BeginDate" => $date,
                "EndDate" => $date
            ],
        ];

        // $data = $this->sendRequest($params);

        /**
         * * Remove Null after test
         */
        return $filtered_data = $this->filterDataResponse(null);

        /**
         * * Should Assign Data base on chart types
         */
        // $charts = ApexChart::commonChartDataSort($filtered_data);

        // return $charts;
    }
    public function getIndicatorGraphsByRoute(string $route): array
    {
        /**
         * * Double Check if user has access to the indicator
         */

        $indicator_details = $this->getIndicatorDetailsByRoute($route);

        // Check emptiness
        $query = DB::select('SELECT a.id,a.name AS graph_name, a.title AS graph_title,
                                    b.name AS input_name, b.title AS input_title,b.type, b.size
                           FROM graphs AS a,
                             inputs AS b,
                             indicators_graph_input AS c
                           WHERE a.id= c.graph_id
                            AND b.id = c.input_id
                            AND c.indicator_id = ?', [$indicator_details['id']]);
        $graphs = [];

        // maybe it needs a function?
        foreach ($query as $result) {

            if (!isset($graphs[$result->graph_name])) {
                $graphs[$result->graph_name] = [];

                $graphs[$result->graph_name] = [
                    'id' => $result->id,
                    'title' => $result->graph_title
                ];
            }

            if (!isset($graphs[$result->graph_name]['inputs']))
                $graphs[$result->graph_name]['inputs'] = [];

            $inputs = [
                'name' => $result->input_name,
                'title' => $result->input_title,
                'type' => $result->type,
                'size' => $result->size
            ];

            $graphs[$result->graph_name]['inputs'][] = $inputs;

        }
        return $graphs;
    }
    public function getIndicatorGraphInputs(int $indicator_id, int $graph_id)
    {
        $query = DB::select('SELECT a.name
                    FROM inputs AS a,
                    indicators_graph_with_input AS b
                    WHERE a.id = b.input_id
                    AND b.indicator_id = ?
                    AND b.graph_id = ?', [$indicator_id, $graph_id]);

        dd($query);
    }
    private function getIndicatorDetailsByRoute(string $route): Model
    {
        return Indicator::where('route', $route)->firstOrFail();
    }
    public function getIndicatorDailyGraphs(int $indicator_id): array
    {
        /**
         *!Should handle errors
         */

        return DB::select('SELECT a.title,b.name
                             FROM indicators_daily_graph AS a,
                             graphs AS b
                             WHERE a.graph_id = b.id
                             AND a.indicator_id = ?', [$indicator_id]);
    }
    public function getIndicatorReports(string $subdomain, string $route): Collection
    {
        $indicator_id = self::getIndicatorIdByRoute($route);

        $company_id = CompanyService::getCompanyIdBySubdomain($subdomain);

        return Report::where(['company_id' => $company_id, 'indicator_id' => $indicator_id])->get();
    }
    public static function getIndicatorIdByRoute(string $route): int
    {
        return Indicator::where('route', $route)->pluck('id')[0];
    }
    private function cacheDailyIndicatorResponse()
    {
    }
    private function sendRequest(array $params): array
    {
        $query_params = [
            "url" => CompanyUtility::getCompanyApiUrl($params['subdomain']),
            "method" => $params['method'],
            "data" => $params['data']
        ];
        /*
        ! Curls error should be handled
        */
        $this->response = Http::withBody(json_encode($query_params), 'application/json')
            ->get($params['url']);

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
    private function filterDataResponse(array $data = null): array
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
}
