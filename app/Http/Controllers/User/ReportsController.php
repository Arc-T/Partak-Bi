<?php

namespace App\Http\Controllers\User;

use App\Services\ReportService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ReportsController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

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

    public function store(Request $request): RedirectResponse
    {

        // $params = $request->validate([
        //     'report' => 'required|numeric',
        //     'graph' => 'required|numeric',
        //     'comment' => 'nullable|max|255'
        // ]);

        //TODO: check params
        return ReportService::saveReport($this->subdomain, $this->sub_route, $request) ? redirect()->back()->with('success', 'گزارش با موفقیت ثبت گردید !') : redirect()->back()->with('error', 'در ثبت گزارش خطایی رخ داده است !');
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

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy(Request $request): RedirectResponse
    {

        $params = $request->validate([
            'report_id' => 'required'
        ]);

        return ReportService::removeReport(intval($params['report_id'])) ? redirect()->back()->with('success', 'نمودار با موفقیت حذف گردید !') : redirect()->back()->with('error', 'در حذف نمودار خطایی رخ داده است !');
    }
}
