<?php

namespace App\Services;

use App\Models\Graph;
use Illuminate\Support\Facades\DB;

class GraphService
{
    public function getGraphIdByName(string $graph_name): int
    {
        $query = Graph::where('name', $graph_name)->pluck('id')[0];

        return $query;
    }

    public static function getGraphInputsByIndicatorId(string $route): array
    {

        $indicator_id = IndicatorService::getIndicatorIdByRoute($route);

        $query = DB::select('SELECT a.*, b.graph_id
                             FROM inputs AS a, indicators_graph_input AS b
                             WHERE a.id = b.input_id
                             AND b.indicator_id = ?', [$indicator_id]);
        return $query;
    }


}