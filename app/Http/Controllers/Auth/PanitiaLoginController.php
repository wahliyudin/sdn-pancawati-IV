<?php

namespace App\Http\Controllers\Auth;

use Authy\AuthyApi;
use App\Models\User;
use App\Models\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class PanitiaLoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/panitia-login';

    protected $guard = 'panitia';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {
        return view('auth.panitia-login');
    }

    /* @POST
    */
    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if (Auth::guard('panitia')->attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('panitia.dashboard');
        }
        dd(Auth::guard('panitia')->attempt(['email' => $request->email, 'password' => $request->password]));
        return redirect('/panitia-login')->with('error', 'Invalid Email address or Password');
    }

    /* GET
    */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        return redirect('/panitia-login');
    }
}
