<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class LoginController extends Controller
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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


    /**
     * O login tem como comportamento padrão redicionar o usuário para o local anterior ao login
     * Para mudar esse comportamento sobreescrever o método authenticated
     */
    protected function authenticated(Request $request, $user)
    {
        if(session('enrollment'))
        {
            return redirect()->route('enrollment.confirm');
        }
    }


    /**
     * O logout por padrão redireciona para a home
     * para mudar o comportamento sobrescrever o método logout fazendo o
     * logout manual usaldo a facade Auth
     * use Illuminate\Support\Facades\Auth;
     */
    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('home');
    }


}
