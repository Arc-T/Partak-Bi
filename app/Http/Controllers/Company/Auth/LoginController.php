<?php

namespace App\Http\Controllers\Company\Auth;

use App\Http\Controllers\Company\BaseController;
use Exception;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LoginController extends BaseController
{
    protected $user;

    public function index(Request $request)
    {
        if ($request->session()->has('user_session')) {

            return redirect()->route('company.dashboard.index', [self::$subdomain]);
        }

        $company_table = Company::where('subdomain', self::$subdomain)->first();

        return view('common.login', [
            'company'   => $company_table
        ]);
    }


    public function login(Request $request)
    {
        try {

            if (Auth::attempt(['username' => $request['username'], 'password' => $request['password']])) {

                if (Auth::user()->active == '0') return redirect()->back()->with('error', 'کاربر غیر فعال می باشد !');

                return redirect()->route('company.dashboard', [self::$subdomain]);

            } else {

                return redirect()->back()->with(

                    'error',
                    'کاربری با مشخصات وارد شده یافت نشد !',
                );
            }
        } catch (Exception $ex) {

            return redirect()->back()->with(

                'error',
                'مشکلی در پایگاه داده رخ داده است !',

            );
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('company.login.view', [self::$subdomain])->with('warning', 'شما با موفقیت از سامانه خارج شدید !');
    }
}
