<?php

namespace App\Http\Controllers\Partak\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class LoginController extends Controller
{

    // if admin is already logged in, redirect to dashboard
    public function index(): RedirectResponse | View
    {
        if (Auth::check() && Auth::user()->id == 1) {

            return redirect()->route('partak.dashboard');
        }

        return view('common.login');
    }

    public function authenticate(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required']
        ]);

        if (Auth::attempt(['username' => $credentials['username'], 'password' => $credentials['password'] , 'company_id' => 1])) {

            // $request->session()->regenerate();

            // $sessionData = encrypt($user->ID);

            // $request->session()->put('admin_session', $sessionData);

            return redirect()->route('partak.dashboard');
        } else {

            return redirect()->back()->with(

                'error',
                'کاربری با مشخصات وارد شده یافت نشد !',
            );
        }
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
