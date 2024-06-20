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


}