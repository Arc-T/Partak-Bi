<?php

namespace App\Services;

use App\Models\Report;
use App\Models\Indicator;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;

class IndicatorService
{
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
    public function getIndicatorGraphsByRoute(string $route): array
    {
        /**
         * * Double Check if user has access to the indicator
         */

        $indicator_details = $this->getIndicatorDetailsByRoute($route);

        // Check emptiness
        $query = DB::select('SELECT a.id,a.name,a.title
                             FROM graphs AS a,
                               indicators_graph_input AS b
                             WHERE a.id= b.graph_id
                             AND b.indicator_id = ?
                             GROUP BY b.graph_id', [$indicator_details['id']]);

        return $query;
    }
    public static function getIndicatorDetailsByRoute(string $route): Model
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
    public static function filterDataResponse(array $data = null): array
    {

        // $data2 = [
        //     'Dates' => [
        //         '2014-02-05' => [
        //             'Provinces' => [
        //                 'Isfahan' => [
        //                     'Status' => [
        //                         'آماده به نصب' => 30,
        //                         'بهره بردار' => 20,
        //                         'مشکل دار' => 22,
        //                         'جمع شده' => 43
        //                     ],
        //                 ],
        //                 'Tehran' => [
        //                     'Status' => [
        //                         'آماده به نصب' => 80,
        //                         'بهره بردار' => 330,
        //                         'مشکل دار' => 222,
        //                         'جمع شده' => 43
        //                     ],
        //                 ],
        //             ],
        //         ],
        //         '2015-03-10' => [
        //             'Provinces' => [
        //                 'Isfahan' => [
        //                     'Status' => [
        //                         'آماده به نصب' => 45,
        //                         'بهره بردار' => 150,
        //                         'مشکل دار' => 90,
        //                         'جمع شده' => 43
        //                     ],
        //                 ],
        //                 'Tehran' => [
        //                     'Status' => [
        //                         'آماده به نصب' => 60,
        //                         'بهره بردار' => 200,
        //                         'مشکل دار' => 180,
        //                         'جمع شده' => 43
        //                     ],
        //                 ],
        //             ],
        //         ],
        //         '2016-04-15' => [
        //             'Provinces' => [
        //                 'Isfahan' => [
        //                     'Status' => [
        //                         'آماده به نصب' => 25,
        //                         'بهره بردار' => 75,
        //                         'مشکل دار' => 50,
        //                         'جمع شده' => 43
        //                     ],
        //                 ],
        //                 'Tehran' => [
        //                     'Status' => [
        //                         'آماده به نصب' => 70,
        //                         'بهره بردار' => 250,
        //                         'مشکل دار' => 150,
        //                         'جمع شده' => 43
        //                     ],
        //                 ],
        //             ],
        //         ],
        //         '2017-05-20' => [
        //             'Provinces' => [
        //                 'Isfahan' => [
        //                     'Status' => [
        //                         'آماده به نصب' => 55,
        //                         'بهره بردار' => 130,
        //                         'مشکل دار' => 75,
        //                         'جمع شده' => 43
        //                     ],
        //                 ],
        //                 'Tehran' => [
        //                     'Status' => [
        //                         'آماده به نصب' => 40,
        //                         'بهره بردار' => 120,
        //                         'مشکل دار' => 100,
        //                         'جمع شده' => 43
        //                     ],
        //                 ],
        //             ],
        //         ],
        //         '2018-06-25' => [
        //             'Provinces' => [
        //                 'Isfahan' => [
        //                     'Status' => [
        //                         'آماده به نصب' => 90,
        //                         'بهره بردار' => 300,
        //                         'مشکل دار' => 210,
        //                         'جمع شده' => 43
        //                     ],
        //                 ],
        //                 'Tehran' => [
        //                     'Status' => [
        //                         'آماده به نصب' => 35,
        //                         'بهره بردار' => 110,
        //                         'مشکل دار' => 80,
        //                         'جمع شده' => 43
        //                     ],
        //                 ],
        //             ],
        //         ],
        //     ],
        // ];

        // Provinces, Cities , Mdfs
        $location_filter = array_key_first(array_values($data['Dates'])[0]);

        // Status
        $indicator_filter = array_key_first(array_values(array_values($data['Dates'])[0][$location_filter])[0]);

        $dates = array_keys($data['Dates']);
        
        $jalali_dates = [];
        $indicators = [];
        $locations = [];

        foreach ($dates as $date) {

            $jalali_dates [] = verta($date)->format('Y-m-d');

            $locations = array_keys($data['Dates'][$date][$location_filter]);

            foreach ($locations as $location) {

                $indicator_result = $data['Dates'][$date][$location_filter][$location]['StatusName'];

                foreach ($indicator_result as $indicator_key => $indicator_value) {

                    $has_key = array_search($indicator_key, array_column($indicators, 'name'));

                    if ($has_key === false) {
                        // Add new indicator with its value
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

        $result = [
            'dates' => $jalali_dates,
            'locations' => $locations,
            'indicators' => $indicators
        ];

        return $result;
    }

}