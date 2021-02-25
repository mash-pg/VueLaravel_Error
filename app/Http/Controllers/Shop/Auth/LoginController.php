<?php

namespace App\Http\Controllers\Shop\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = RouteServiceProvider::Shop_HOME;

    public function __construct()
    {
        $this->middleware('guest:shop')->except('logout');
    }

    protected function guard()
    {
        return Auth::guard('shop');
    }

    public function showLoginForm()
    {
        return view('shop.auth.login');
    }

    public function logout(Request $request)
    {
        Auth::guard('shop')->logout();

        return $this->loggedOut($request);
    }

    public function loggedOut(Request $request)
    {
        return redirect(route('shop.login'));
    }
}
