<?php

namespace App\Classes;

use Illuminate\Support\Facades\DB;
use Hekmatinasser\Verta\Facades\Verta;

/**
need a function to check inputs base on indicators
*/

class IndicatorClass
{
    public static function apexchartGraphHandler($data)
    {
        $inputs = [

            'indicator'           => $data->indicator,
            'start_date'          => Verta::parse($data->start_date)->datetime()->format('Y-m-d'),
            'end_date'            => isset($data->end_date) ? Verta::parse($data->end_date)->datetime()->format('Y-m-d') : Verta::parse($data->start_date)->datetime()->format('Y-m-d'),
            'customer_type'       => $data->checked_customer_type,
            'customer_status_ref' => $data->checked_customer_status,
            'graph'               => $data->graph_type,

        ];

        $query_result = self::getIndicatorData($inputs);

        return $graph = self::getGraphType($inputs['graph'], $query_result);
    }

    private static function commonGraphType($data)
    {
        $result = [
            "graph"     => [],
            "categories" => []
        ];

        foreach ($data as $i => $item) {

            $status = $item->Stacks;
            $count  = $item->Count;
            $categories  = $item->Date;

            if (!isset($result['graph'][$status])) {
                $result['graph'][$status] = [
                    'name' => $status,
                    'data' => [],
                ];
            }
            $result['graph'][$status]['data'][] = $count;
        }
        $result['graph'] = array_values($result['graph']);

        $result['categories'] = self::sortDateTimeJalali($data[0]->Date, $data[count($data) - 1]->Date);

        return $result;
    }

    private static function getIndicatorData($data)
    {
        $query = '';

        switch ($data['indicator']) {
            case 'customers':
                $query = DB::connection('db_hamyarnet') //Needs to be Dynamic
                    ->table('ind_customers')
                    ->select('Serial', 'CustomerType AS Entities', 'Date', 'Province', 'StatusTitle AS Stacks', 'Count')
                    ->where('Date', '>=', $data['start_date'])
                    ->where('Date', '<=', $data['end_date'])
                    ->where('CustomerType', $data['customer_type'])
                    ->whereIn('StatusRef', $data['customer_status_ref'])
                    ->get()
                    ->toArray();
                break;
        }

        [1,'ADSL','2024-02-13','Teh','بهره بردار',3];
        [2,'ADSL','2024-02-13','Teh','جمع شده',3];
        [3,'ADSL','2024-02-13','Teh','مشکل دار',3];
        [4,'ADSL','2024-02-13','Teh','بدون وضعیت',3];
        [5,'ADSL','2024-02-13','Teh','آماده به نصب',3];

        return $query;
    }

    private static function getGraphType($graph, $data)
    {
        switch ($graph) {
            case 'bar':
                return self::barIndicator($data);
            case 'line':
                return self::lineIndicator($data);
            case 'pie':
                return self::pieIndicator($data);
            case 'radar':
                return self::areaIndicator($data);
            case 'area':
                return self::radarIndicator($data);
            case 'stacked':
                return self::stackedIndicator($data);
            case 'radial':
                return self::pieIndicator($data);
            default:
                return [];
        }
    }

    private static function stackedIndicator($data)
    {
        $result = [
            "graph"     => [],
            "categories" => []
        ];

        foreach ($data as $i => $item) {

            $status = $item->Stacks;
            $count  = $item->Count;
            $categories  = $item->Date;

            if (!isset($result['graph'][$status])) {
                $result['graph'][$status] = [
                    'name' => $status,
                    'data' => [],
                ];
            }
            $result['graph'][$status]['data'][] = $count;
        }
        $result['graph'] = array_values($result['graph']);

        $result['categories'] = self::sortDateTimeJalali($data[0]->Date, $data[count($data) - 1]->Date);

        return $result;
    }

    private static function pieIndicator($data)
    {

        $indicator_graph = array();

        foreach ($data as $result) {

            $indicator_graph['categories'][] = $result->Stacks;
            $indicator_graph['graph'][]      = $result->Count;
        }

        return $indicator_graph;
    }

    private static function radarIndicator($data)
    {
        $result = [
            "graph"     => [],
            "categories" => []
        ];

        foreach ($data as $i => $item) {

            $status = $item->Stacks;
            $count  = $item->Count;
            $categories  = $item->Date;

            if (!isset($result['graph'][$status])) {
                $result['graph'][$status] = [
                    'name' => $status,
                    'data' => [],
                ];
            }
            $result['graph'][$status]['data'][] = $count;
        }
        $result['graph'] = array_values($result['graph']);

        $result['categories'] = self::sortDateTimeJalali($data[0]->Date, $data[count($data) - 1]->Date);

        return $result;
    }

    private static function areaIndicator($data)
    {
        $result = [
            "graph"     => [],
            "categories" => []
        ];

        foreach ($data as $i => $item) {

            $status = $item->Stacks;
            $count  = $item->Count;
            $categories  = $item->Date;

            if (!isset($result['graph'][$status])) {
                $result['graph'][$status] = [
                    'name' => $status,
                    'data' => [],
                ];
            }
            $result['graph'][$status]['data'][] = $count;
        }
        $result['graph'] = array_values($result['graph']);

        $result['categories'] = self::sortDateTimeJalali($data[0]->Date, $data[count($data) - 1]->Date);

        return $result;
    }
    private static function barIndicator($data)
    {
        $result = [
            "graph"     => [],
            "categories" => []
        ];

        foreach ($data as $i => $item) {

            $status = $item->Stacks;
            $count  = $item->Count;
            $categories  = $item->Date;

            if (!isset($result['graph'][$status])) {
                $result['graph'][$status] = [
                    'name' => $status,
                    'data' => [],
                ];
            }
            $result['graph'][$status]['data'][] = $count;
        }
        $result['graph'] = array_values($result['graph']);

        $result['categories'] = self::sortDateTimeJalali($data[0]->Date, $data[count($data) - 1]->Date);

        return $result;
    }

    private static function lineIndicator($data)
    {
        $result = [
            "graph"     => [],
            "categories" => []
        ];

        foreach ($data as $i => $item) {

            $status = $item->Stacks;
            $count = $item->Count;
            $categories     = $item->Date;

            if (!isset($result['graph'][$status])) {
                $result['graph'][$status] = [
                    'name' => $status,
                    'data' => [],
                ];
            }
            $result['graph'][$status]['data'][] = $count;
        }

        $result['categories'] = self::sortDateTimeJalali($data[0]->Date, $data[count($data) - 1]->Date);

        $result['graph'] = array_values($result['graph']);

        return $result;
    }

    private static function sortDateTimeJalali($start, $end)
    {
        $datePeriod = [];

        if ($start == $end) {
            $datePeriod[] = verta($start)->format('Y-m-d');
        } else {
            $counter = 1;
            $temp = '';
            $datePeriod[] = verta($start)->format('Y-m-d');
            $end = verta($end)->format('Y-m-d');

            while ($counter < 40) {
                $temp = verta($start)->addDays($counter)->format('Y-m-d');
                $datePeriod[] = $temp;
                $counter++;

                if ($end == $temp) {
                    break;
                }
            }
        }

        return $datePeriod;
    }

    private static function sortDateTimeGreg($start, $end)
    {
        $datePeriod = [];

        if ($start == $end) {
            $datePeriod[] = Verta::parse($start)->datetime()->format('Y/m/d');
        } else {
            $counter = 1;
            $temp = '';

            while ($counter < 40) {
                $temp = date('Y-m-d', strtotime($start . " + $counter days"));
                $datePeriod[] = $temp;
                $counter++;

                if ($end == $temp) {
                    break;
                }
            }
        }

        return $datePeriod;
    }
}
