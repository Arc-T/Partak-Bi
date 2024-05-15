<?php

namespace App\Http\Controllers\Company;

use App\Http\Services\CompanyService;

class CustomersController extends BaseController
{
    public function index()
    {
        $t = new CompanyService;

        $general = $t->processIndicator(null);
        
        //$customers_ind_table   = DB::connection('db_' . self::$subdomain)->table('ind_customers')->get()->toArray();
        
        return view('company.dashboard.customers.show',['general' => $general]);
    }

}
