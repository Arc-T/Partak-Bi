<?php

namespace App\Http\Controllers\Company;

use App\Models\Report;
use App\Services\IndicatorService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class IndicatorController extends BaseController
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $t = new IndicatorService;

        $general = $t->processIndicatorDailyGraphs($this->subdomain, 'city');

        $graphs_list = $t->getIndicatorGraphsByRoute('city');

        $reports = Report::all();

        return response()->view('company.dashboard.customers.show', [
            'general' => $general,
            'graphs_list' => $graphs_list,
            'reports' => $reports
        ]);
    }
}
