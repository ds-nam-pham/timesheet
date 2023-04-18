<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\StoreUserRequest;
use App\Services\Auth\AuthService;
use App\Services\Auth\AuthServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session as FacadesSession;
use Session;
class AuthController extends Controller
{
    protected $authService;
    public function __construct(AuthServiceInterface $authService)
    {
        $this->authService = $authService;
    }
    
    public function showRegister()
    {
        return view('auth.register');
    }

    public function register(StoreUserRequest $request){
        $this->authService->registerUser($request->all());
        return redirect()->route('login');
    }

    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('user')->withSuccess('Signed in');
        }
        return redirect("login")->withSuccess('Login details are not valid');
    }

    public function signOut()
    {
        FacadesSession::flush();
        Auth::logout();
        return Redirect('login');
    }

    public function showEmail()
    {
        return view('auth.passwords.forget_password');
    }

    public function sendOtp(Request $request)
    {
        $this->authService->sendOtp($request->all());
        return redirect()->route('otp');
    }

    public function showOtp(){
        return view('auth.passwords.show_otp');
    }

    public function newPassword(Request $request)
    {
        $this->authService->newPassword($request->all());
        return redirect()->route('login');
    }
}
