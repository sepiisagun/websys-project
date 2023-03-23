<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Support\Facades\RateLimiter;


class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        // $request->authenticate();

        $request->ensureIsNotRateLimited();

        if (!Auth::attempt($request->only('email', 'password'), $request->filled('remember'))) {
            RateLimiter::hit($request->throttleKey());

            return redirect('/login')
                ->withErrors(['email' => __('auth.failed')])
                ->withInput()
                ->with([
                    'status' => 'Danger',
                    'message' => 'Invalid Values!',
                    'email' => $request->email
                ]);
        }

        RateLimiter::clear($request->throttleKey());

        $request->session()->regenerate();

        return redirect()->intended(RouteServiceProvider::HOME);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect(route('homepage'));
    }
}
