<?php

namespace App\Http\Controllers\Partak;

use App\Http\Controllers\Controller;
use App\Models\CompanyGroup;
use App\Models\CompanyGroupIndicator;
use App\Models\Indicator;
use App\Models\IndicatorGroup;
use Illuminate\Http\Request;

class CompanyGroupsIndicatorController extends Controller
{
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $indicators_table           = Indicator::all();

        $companies_group_table      = CompanyGroup::all();

        $indicators_group_table     = IndicatorGroup::all();

        $company_group_access_table = CompanyGroupIndicator::where('company_group_id' , $id )->get();

        return view('partak.dashboard.companies-group-indicator.show')->with([

            'indicators'                => $indicators_table ,
            'indicators_group'          => $indicators_group_table,
            'companies_group'           => $companies_group_table,
            'companies_group_access'    => $company_group_access_table,
            'company_group_id'          => $id
        ]);
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
        $indicatorIds = $request->checked_indicators;

        try{

            CompanyGroupIndicator::where('company_group_id' , $id)->delete();

            $records = [];

            foreach ($indicatorIds as $indicatorId) {
                $records[] = [
                    'indicator_id' => $indicatorId,
                    'company_group_id' => $id
                ];
            }

            CompanyGroupIndicator::insert($records);

            return redirect()->back()->with('success', ' دسترسی گروه شرکت با موفقیت اعمال شد !');

        }catch(\Exception $e){

            return redirect()->back()->with('error', 'خطایی در اعمال شاخص ها رخ داده است ! ');
        }
    }
}
