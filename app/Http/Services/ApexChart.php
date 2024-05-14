<?php

namespace App\Http\Services;

class ApexChart
{
    /*
        ! name convention problem with data `Count`
    */
    public function pieChartDataSort(array $data, array $filters): array
    {
        $results = [];

        foreach ($filters as $filter) {
            $results[$filter] = [
                'name' => [],
                'data' => []
            ];
        }

        foreach ($data as $item) {

            foreach ($filters as $filter) {

                $key = array_search($item[$filter], $results[$filter]['name']);
                if ($key === false) {

                    $results[$filter]['name'][] = $item[$filter];
                    $results[$filter]['data'][] = $item['Count'];
                } else {

                    $results[$filter]['data'][$key] += $item['Count'];
                }
            }
        }

        return $results;
    }

    public function basicChartDataSort(array $data, array $filters): array
    {
        $results = [];
    
        foreach ($data as $item) {

            foreach ($filters as $filter) {

                $key = array_search($item[$filter], array_column($results, 'name'));
    
                if ($key === false) {

                    $results[] = [
                        'name' => $item[$filter],
                        'data' => $item['Count']
                    ];
                } else {

                    $results[$key]['data'] += $item['Count'];
                }
            }
        }

        dd($results);
    
        return $results;
    }
}
