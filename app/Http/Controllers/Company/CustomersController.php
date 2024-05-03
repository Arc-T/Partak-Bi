<?php

namespace App\Http\Controllers\Company;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Classes\CompanyClass;

class CustomersController extends Controller
{
    protected $subdomain;

    public function __construct(Request $request)
    {
        if (!isset($this->subdomain)) $this->subdomain = $request->route('subdomain');
    }

    public function index()
    {
        $view_details             = CompanyClass::get_company_view_details($this->subdomain);

        $customers_ind_table      = DB::connection('db_' . $this->subdomain)->table('ind_customers')->get()->toArray();

        return view('companies.menu.customers.customer_indicator_type')->with([
            'common'        => $view_details,
            'indicators'    => $customers_ind_table
        ]);
    }
}
