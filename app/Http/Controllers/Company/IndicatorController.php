<?php

namespace App\Http\Controllers\Company;

use App\Services\IndicatorService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class IndicatorController extends BaseController
{
    private string $current_route;
    public function __construct(Request $request)
    {
        parent::__construct($request);

        $this->current_route = explode('.', Route::currentRouteName())[3];
    }
    public function index()
    {
        $t = new IndicatorService;

        // $general = $t->processIndicatorRequest(null);

        $general = $t->processIndicatorDailyGraphs($this->subdomain, $this->current_route);
        
        $graphs_list = $t->getIndicatorGraphsByRoute($this->current_route);

        return view('company.dashboard.customers.show', [
            'general' => $general,
            'graphs_list' => $graphs_list
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input_id = $request->input('id');
        $t = new IndicatorService;

        dd($t->getIndicatorRequestParametersByGraphId($input_id));
        
        $size = $request->input('size');
        $title = $request->input('title');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
