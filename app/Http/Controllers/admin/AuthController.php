<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function login(LoginRequest $loginRequest)
    {
        $user = $this->isAuthenticate($loginRequest);

        if (! $user) {
            return redirect()->back()
                ->withErrors(['email' => ['Invalid credentials']])
                ->withInput();
        }

        Auth::login($user);

        return to_route('dashboard')->with('success', 'Login Successfully');
    }

    private function isAuthenticate($loginRequest)
    {
        $user = UserRepository::findByEmail($loginRequest->email);
        if (! is_null($user) && Hash::check($loginRequest->password, $user->password)) {
            return $user;
        }

        return false;
    }

    public function logout()
    {
        $user = auth()->user();
        Auth::logout($user);

        return redirect()->route('login');
    }
}
