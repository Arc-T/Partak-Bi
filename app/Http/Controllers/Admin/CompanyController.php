<?php

namespace App\Http\Controllers\Admin;

use Exception;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\Controller;
use App\Models\CompanyGroup;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $company_list = Company::all();

        return view('admin.dashboard.companies.index')->with([

            'companies' => $company_list,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies_group = CompanyGroup::all();
        return view('admin.dashboard.companies.create', ['companies_group' => $companies_group]);
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
            DB::beginTransaction();

            $file = $request->file('company_logo');
            $filename = $file->getClientOriginalName();
            $file->move(public_path('assets/images/logo/'), $filename);
            $company_table = new Company;
            $company_table->name            = $request->company_name;
            $company_table->primary_color   = $request->company_color;
            $company_table->secondary_color = $request->company_color_background;
            $company_table->logo            = $filename;
            $company_table->group_id        = $request->company_group;
            $company_table->active          = $request->company_is_active;
            $company_table->subdomain       = $request->company_url;
            $company_table->description     = $request->company_description;
            $company_table->save();

            DB::commit();

            return redirect()->route('admin.companies.index')->with('success', 'اطلاعات شرکت با موفقیت ساخته شد!');
        } catch (Exception $ex) {

            return redirect()->back()->with('error', 'خطا در  ثبت اطلاعات لطفا دوباره تلاش کنید.');
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
        $company_table = Company::findOrFail($id);

        $companies_group = CompanyGroup::all();

        return view('admin.dashboard.companies.edit', [
            'companies_group' => $companies_group,
            'company_info' => $company_table
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

            DB::beginTransaction();

            $company_table = Company::where('id', $id)->update([

                "name"                      => $request->company_name,
                "primary_color"             => $request->company_color,
                "secondary_color"           => $request->company_color_background,
                "active"                    => $request->company_is_active,
                "group_id"                  => $request->company_group,
                "subdomain"                 => $request->company_url,
                "description"               => $request->company_description,
            ]);


            if ($request->file('company_logo') != NULL) {

                $logo = Company::where('id', $id)->first();

                File::delete(public_path('assets/images/logo/') . $logo->Logo);

                $file = $request->file('company_logo');

                $filename = $file->getClientOriginalName();

                $file->move(public_path('assets/images/logo/'), $filename);

                Company::where('id', $id)->update([

                    "Logo"  => $filename
                ]);
            }

            DB::commit();

            return redirect()->route('admin.companies.index')->with('success', 'اطلاعات شرکت با موفقیت آپدیت شد !');
        } catch (Exception $ex) {

            DB::rollBack();

            return redirect()->back()->with('error', 'خطا در  ثبت اطلاعات لطفا دوباره تلاش کنید.');
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
        $logo = Company::where('id', $id)->first();

        File::delete(public_path('assets/images/logo/') . $logo->Logo);

        Company::where('id', $id)->delete();

        return redirect()->route('admin.companies.index')->with('success', 'شرکت با موفقیت حذف شد !');
    }
}
