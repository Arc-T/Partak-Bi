<?php

namespace App\Services;

use Http;

class RequestService
{
    public static function sendRequest(array $query_params, string $api_url): array
    {
        try {

            $response = Http::withBody(json_encode($query_params), 'application/json')
                ->get($api_url);

            // if ($response->successful()) {
            //     $data = $response->json();
            //     return $data['Result'];
            // }

            $data = $response->json();

            return $data['Result'][0];

        } catch (\Exception $exception) {

            dd($exception);
            /**
             * * TODO: Log
             */
        }
        return [];
    }
    public static function createRequestParams(array $params, int $indicator_id, bool $is_daily): array
    {
        $query = \DB::select('SELECT a.name,a.type,b.parent_id 
                              FROM indicators_query_params AS a, indicators AS b
                              WHERE indicator_id = ?
                              AND a.indicator_id = b.id', [$indicator_id]);

        $query_params = [
            "method" => "indicator",
            'data' => [
                'IndicatorRef' => $query[0]->parent_id
            ]
        ];

        $counter = 0;

        foreach ($query as $row) {

            if ($row->type == 'array') {

                if ($is_daily)
                    $query_params['data'][$row->name] = array_map('intval', explode('&', $params[$counter]));
                else
                    $query_params['data'][$row->name] = $params[$counter];
            } else
                $query_params['data'][$row->name] = $params[$counter];

            ++$counter;
        }


        // $query_params = [
        //     "method" => "indicator",
        //     "data" => [
        //         "IndicatorRef" => $indicator_id,
        //         $location => $params['location'][$location],
        //         "BeginDate" => Verta::parse($params['begin_date'] . '00:00:01')->formatGregorian('Y-m-d H:i:s'),
        //         "EndDate" => Verta::parse($params['end_date'] . ' 23:59:59')->formatGregorian('Y-m-d H:i:s')
        //     ],
        // ];

        return $query_params;

    }
}