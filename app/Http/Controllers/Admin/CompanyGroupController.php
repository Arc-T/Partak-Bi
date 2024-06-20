<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\CompanyGroup;
use Illuminate\Http\Request;

class CompanyGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies_table       = Company::all();
        $companies_group_table = CompanyGroup::all();

        return view('admin.dashboard.companies-group.index' ,[
            'companies'       => $companies_table,
            'companies_group' => $companies_group_table

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.dashboard.companies-group.create');
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

            $company_group_table = new CompanyGroup;

            $company_group_table->name          = $request->company_group_name;
            $company_group_table->active        = $request->company_group_active;
            $company_group_table->save();

            return redirect()->route('admin.companies-group.index')->with('success', 'گروه شرکت جدید با موفقیت ساخته شد !');
        } catch (\Exception $e) {

            return redirect()->back()->with('error', 'مشکلی در ساخت گروه شرکت رخ داده است !');
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
        $company_group = CompanyGroup::where('id', $id)->first();

        return view('admin.dashboard.companies-group.edit',[

            'company_group'   => $company_group,

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
        try {

            CompanyGroup::where('id', $id)->update([

                'name'          => $request->company_group_name,
                'active'        => $request->company_group_active,
            ]);

            return redirect()->route('admin.companies-group.index')->with('success', 'گروه شرکت با موفقیت آپدیت شد !');
        } catch (\Exception $e) {

            return redirect()->back()->with('error', 'مشکلی در آپدیت گروه شرکت رخ داده است !');
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

            // CompanyGroupAccess::where('GroupID', $id)->delete();

            CompanyGroup::where('id', $id)->delete();

            Company::where('group_id', $id)->update([

                'group_id' => NULL,
            ]);

            return redirect()->route('admin.companies-group.index')->with('success', 'گروه شرکت با موفقیت حذف شد !');
        } catch (\Exception $e) {

            return redirect()->back()->with('error', 'مشکلی در ساخت حذف گروه شرکت رخ داده است !');
        }
    }
}
