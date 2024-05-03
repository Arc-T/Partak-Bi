<?php

namespace App\Http\Controllers\Company;

use App\Classes\CompanyClass;

class DashboardController extends BaseController
{
    protected $user;

    public function index()
    {
        $view_details             = CompanyClass::get_company_view_details(self::$subdomain);

        // $indicator_customer_table = DB::connection('db_hamyarnet')->table('ind_customers')->get()->toArray();

        $date = [];

        // foreach ($indicator_customer_table as $value) {
        //     $date[] = verta($value->Date)->format('%d');
        // }
        $sum = [12, 14, 15, 16, 166];

        return view('company.dashboard.home.index')->with([

            'common'        => $view_details,
            'date'          => $date,
            'sum'           => $sum
        ]);
    }
}
