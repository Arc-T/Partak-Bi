<?php

namespace App\Http\Controllers\Company;

use App\Services\IndicatorService;

class CustomersController extends BaseController
{
    public function index()
    {
        $t = new IndicatorService;

        $general = $t->processIndicatorRequest(null);

        $indicators_list = $t->getIndicatorsList(1);

        // $provinces = array_values(array_values($tt['Date'])[0]['Provinces']);

        // $t = json_encode($data);

        // $provinces = array_keys(array_values($data['Date'])[0]['Provinces']);

        //$customers_ind_table   = DB::connection('db_' . self::$subdomain)->table('ind_customers')->get()->toArray();

        return view('company.dashboard.customers.show', [
            'general' => $general,
            'indicators_list' => $indicators_list
        ]);
    }
}
