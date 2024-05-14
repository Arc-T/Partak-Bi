<?php

namespace App\Http\Controllers\Company;

class DashboardController extends BaseController
{
    protected $user;

    public function index()
    {
        // $indicator_customer_table = DB::connection('db_hamyarnet')->table('ind_customers')->get()->toArray();

        $date = [];

        // foreach ($indicator_customer_table as $value) {
        //     $date[] = verta($value->Date)->format('%d');
        // }
        $sum = [12, 14, 15, 16, 166];

        return view('company.dashboard.home.index',[
            'date'          => $date,
            'sum'           => $sum
        ]);
    }
}
