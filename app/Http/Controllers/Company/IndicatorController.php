<?php

namespace App\Http\Controllers\Company;

use App\Services\IndicatorService;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;

class IndicatorController extends BaseController
{
    public function index()
    {
        $t = new IndicatorService;

        $general = $t->processIndicatorRequest(null);

        $graphs_list = $t->getGraphsList(1);
        
        $indicators_list = $t->getIndicatorInputs(1);

        // $provinces = array_values(array_values($tt['Date'])[0]['Provinces']);

        // $t = json_encode($data);

        // $provinces = array_keys(array_values($data['Date'])[0]['Provinces']);

        //$customers_ind_table   = DB::connection('db_' . self::$subdomain)->table('ind_customers')->get()->toArray();

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
        $size = $request->input('*_size');
        $title = $request->input('*_title');
        $provinces = $request->input('*_provinces');

        dd($size,$title,$provinces);


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
