<?php

namespace App\Http\Controllers;

use App\Enums\UserRole;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(LoginRequest $request)
    {
        $user = User::whereEmail($request->input('email'))->first();

        if (! $user) {
            return redirect()->back()->withErrors([
                'email' => ['User not found.'],
            ]);
        }

        if (! Hash::check($request->input('password'), $user->password)) {
            return redirect()->back()->withErrors([
                'email' => ['Invalid user credentials.'],
            ]);
        }

        Auth::login($user, $request->boolean('remember'));

        return redirect()->to(RouteServiceProvider::HOME);
    }

    public function showLoginPage()
    {
        return view('auth.login');
    }

    public function register(RegisterRequest $request)
    {
        $createdUser = User::create($request->safe()->toArray());

        event(new Registered($createdUser));

        $createdUser->assignRole(UserRole::Student);

        Auth::login($createdUser);

        return redirect()->to(RouteServiceProvider::HOME);
    }

    public function showRegisterPage()
    {
        return view('auth.register');
    }

    public function logout(Request $request)
    {
        if ($request->user()) {
            Auth::logout();
        }

        return to_route('auth.login');
    }
}
