<?php

namespace App\Http\Controllers\Admin;

use Exception;
use App\Http\Controllers\Controller;
use App\Http\Utilities\DatabaseUtility;
use App\Models\CompanyDatabase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CompanyDatabaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies_databse_table = DB::select('SELECT
        a.*,
        b.name,
        b.id
        AS CID FROM companies_database AS a,
        companies AS b
        WHERE a.company_id = b.id');

        return view('admin.dashboard.companies-database.index', [

            'companies_database' => $companies_databse_table
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies_databse_table = DB::select('SELECT a.name,
                                                a.id FROM companies AS a
                                                LEFT JOIN companies_database AS b ON a.id = b.company_id
                                                WHERE b.id IS NULL;');

        return view('admin.dashboard.companies-database.create', [

            'companies_database' => $companies_databse_table
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $params = [
            'host'            => $request->database_ip,
            'username'        => $request->database_username,
            'password'        => $request->database_password,
            'database'        => $request->database_name,
            'port'            => $request->database_port,
            'company_details' => explode('|', $request->company_detail)
        ];

        if ($request->has('test_connection')) {

            $response = DatabaseUtility::checkDatabaseConnection($params);

            if ($response) {

                redirect()->back()->with('success', 'اطلاعات پایگاه داده صحیح می باشد و می توانید آن را ذخیره کنید !')->withInput();
            } else {

                return redirect()->back()->with('error', 'اطلاعات پایگاه داده صحیح نمی باشند !')->withInput();
            }
        } elseif ($request->has('save_connection')) {

            $company_db_table = new CompanyDatabase;

            try {

                $company_db_table->host         = $params['host'];
                $company_db_table->username     = $params['username'];
                $company_db_table->password     = $params['password']; // TODO  needs to be hashed
                $company_db_table->port         = $params['port'];
                $company_db_table->company_id   = $params['company_details'][0];
                $company_db_table->db           = $params['database'];
                $company_db_table->connection   = '0';
                $company_db_table->save();

                return redirect()->route('admin.companies-database.index')->with('success', 'اطلاعات پایگاه داده با موفقیت ثبت شد !');
            } catch (Exception $e) {

                return redirect()->back()->with('error', 'خطایی در پایگاه داده رخ داده است !')->withInput();
            }
        } else {

            return redirect()->back()->with('error', 'خطایی در سامانه رخ داده است !');
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

        /**
         * ! Should Be implemented by query model
         */

        $companies_databse_table = DB::select('SELECT a.*,
        b.name
        FROM companies_database AS a,
        companies AS b
        WHERE a.company_id = b.id');

        $companies_databse_table = $companies_databse_table[0];

        return view(
            'admin.dashboard.companies-database.edit',
            [
                'company_database' => $companies_databse_table
            ]
        );
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
        $params = [
            'host'            => $request->database_ip,
            'username'        => $request->database_username,
            'password'        => $request->database_password,
            'database'        => $request->database_name,
            'port'            => $request->database_port,
            'company_details' => explode('|', $request->company_detail)
        ];

        if ($request->has('test_connection')) {

            $response = DatabaseUtility::checkDatabaseConnection($params);

            if ($response) {

                redirect()->back()->with('success', 'اطلاعات پایگاه داده صحیح می باشد و می توانید آن را ذخیره کنید !')->withInput();
            } else {

                return redirect()->back()->with('error', 'اطلاعات پایگاه داده صحیح نمی باشند !')->withInput();
            }
        } elseif ($request->has('edit_connection')) {

            try {

                CompanyDatabase::where('id', $id)->update([
                    'host'         => $params['host'],
                    'username'     => $params['username'],
                    'password'     => $params['password'], // TODO  needs to be hashed
                    'port'         => $params['port'],
                    'db'           => $params['database'],
                    'connection'   => '0',
                ]);

                return redirect()->route('admin.companies-database.index')->with('success', 'عملیات تغییر اطلاعات با موفقیت انجام شد !');
            } catch (Exception $e) {

                return redirect()->back()->with('error', 'خطایی در پایگاه داده رخ داده است !')->withInput();
            }
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
            CompanyDatabase::where('id', $id)->delete();
            return redirect()->route('admin.companies-database.index')->with('success', 'پایگاه داده با موفقیت حذف شد !');
        } catch (Exception $e) {
            return redirect()->route('admin.database.list')->with('error', 'مشکلی در حذف پایگاه داده رخ داده است !');
        }
    }
}
