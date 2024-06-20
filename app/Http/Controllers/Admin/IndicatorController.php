<?php

namespace App\Http\Controllers\Admin;

use Exception;
use App\Models\Indicator;
use App\Models\IndicatorGroup;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndicatorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $indicators_table = Indicator::all();

        $indicators_group_table = IndicatorGroup::all();

        return view('admin.dashboard.indicators.index')->with([

            'indicators' => $indicators_table,
            'indicators_group' => $indicators_group_table
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $indicators_group_table = IndicatorGroup::all();

        return view('admin.dashboard.indicators.create', ['indicator_groups' => $indicators_group_table]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {

            $indicator_table = new Indicator;

            $indicator_table->name                = $request->indicator_name;
            $indicator_table->active              = $request->indicator_is_active;
            $indicator_table->indicator_group_id  = $request->indicator_group_id;
            $indicator_table->save();

            return redirect()->route('admin.indicators.index')->with('success', 'شاخص با موفقیت ثبت گردید !');
        } catch (Exception $e) {

            return redirect()->back()->with('error', 'خطایی در ثبت شاخص رخ داده است !');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $indicator_query = DB::table('indicators AS a')
            ->join('indicators_group AS b', 'a.indicator_group_id', '=', 'b.id')
            ->select('a.*', 'b.id AS IGID')
            ->where('a.id', $id)
            ->first();

        $indicator_group_table = IndicatorGroup::all();

        return view('admin.dashboard.indicators.edit', ['indicator' => $indicator_query, 'indicator_groups' => $indicator_group_table]);
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
        try {

            Indicator::where('id', $id)->update([

                'name'                    => $request->indicator_name,
                'indicator_group_id'      => $request->indicator_group_id,
                'active'                  => $request->indicator_is_active,

            ]);

            return redirect()->route('admin.indicators.index')->with('success', 'شاخص با موفقیت آپدیت شد !');
        } catch (\Exception $e) {

            return redirect()->back()->with('error', 'مشکلی در آپدیت شاخص رخ داده است !');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {

            Indicator::where('id', $id)->delete();

            return redirect()->route('admin.indicators.index')->with('success', 'شاخض با موفقیت حذف شد !');

        } catch (\Exception $e) {

            return redirect()->route('admin.indicators.index')->with('error', 'مشکلی در حذف شاخض رخ داده است !');
        }
    }
}
