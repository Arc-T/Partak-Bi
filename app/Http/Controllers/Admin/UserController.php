<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users_table = DB::select('SELECT a.id,a.name,a.username,a.active,a.created_at,b.name

        FROM users AS a, companies AS b WHERE a.company_id = b.id ');

        return view('admin.dashboard.users.index', [
            'users'     => $users_table
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $company_table = DB::select('SELECT a.name,a.id FROM companies AS a LEFT JOIN users AS b ON a.id = b.company_id WHERE b.company_id IS NULL;');

        return view('admin.dashboard.users.create', [

            'companies' => $company_table
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
        try {

            $company_details = explode('|', $request->company_detail);

            $users_table = new User;

            $users_table->username        = $request->user_username;
            $users_table->password        = Hash::make($request->user_password);
            $users_table->active          = $request->user_is_active;
            $users_table->company_id      = $company_details[0];
            $users_table->save();

            return redirect()->route('admin.users.index')->with('success', 'اطلاعات کاربر با موفقیت ثبت شد !');
        } catch (Exception $e) {
            dd($e);
            return redirect()->back()->with('error', 'خطایی در پایگاه داده رخ داده است !');
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
        $user_info = DB::select('SELECT a.*, b.name FROM users AS a, companies AS b WHERE a.id = ? AND a.company_id = b.id',[$id]);

        $user_info = $user_info[0];

        return view('admin.dashboard.users.edit',[
            'user'      => $user_info
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

            User::where('id', $id)->update([

                'username'     => $request->user_username,
                'password'     => Hash::make($request->user_password),
                'active'       => $request->user_is_active,
            ]);

            return redirect()->route('admin.users.index')->with('success', 'عملیات تغییر اطلاعات با موفقیت انجام شد !');
        } catch (\Exception $e) {

            return redirect()->back()->with('error', 'خطایی در پایگاه داده رخ داده است !');
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

            User::where('id', $id)->delete();

            return redirect()->back()->with('success', ' کاربر با موفقیت حذف شد !');
        } catch (Exception $e) {

            return redirect()->back()->with('error', 'مشکلی در حذف رخ داده است !');
        }
    }
}
