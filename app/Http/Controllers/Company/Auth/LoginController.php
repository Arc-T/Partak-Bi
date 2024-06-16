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
        if (Auth::user()) {

            return redirect()->route('company.dashboard.home', [$this->subdomain]);
        }

        $company_table = Company::where('subdomain', $this->subdomain)->first();

        // dd($request->session());

        return view('common.login', [
            'company'   => $company_table
        ]);
    }


    public function login(Request $request)
    {
        try {

            if (Auth::attempt(['username' => $request['username'], 'password' => $request['password']])) {

                if (Auth::user()->active == '0') return redirect()->back()->with('error', 'کاربر غیر فعال می باشد !');

                return redirect()->route('company.dashboard.home', [$this->subdomain]);

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

        return redirect()->route('company.login', [$this->subdomain])->with('warning', 'شما با موفقیت از سامانه خارج شدید !');
    }
}
