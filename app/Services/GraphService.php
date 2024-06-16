<?php

namespace App\Services;
use Illuminate\Support\Facades\DB;

class GraphService{


public function getGraphIdByName(string $graph_name):int{

    $query = DB::select('SELECT id FROM graphs WHERE name =?',[$graph_name]);
    dd($query);


}



}