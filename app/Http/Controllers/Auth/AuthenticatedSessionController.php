<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

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
        $request->authenticate();
    
        $request->session()->regenerate();
    
        $user = auth()->user();
    
        if ($user) {
            $roleNames = '';
    
            $roles = $user->getRoleNames()->toArray();
    
            if (!empty($roles)) {
                $roleNames = implode(', ', $roles);
            }
    
            // Log the login activity
            activity()
                ->performedOn($user)
                // ->withProperties([
                //     'role' => $roleNames,
                // ])
                ->event('Login')
                ->log('User Logged in');
        }
    
        if (auth()->user()->hasRole('admin')) {
            return redirect()->intended(RouteServiceProvider::HOME);
        } else {
            return redirect()->intended(RouteServiceProvider::REQUEST);
        }
    }
    
    public function destroy(Request $request): RedirectResponse
    {
        $user = auth()->user();
    
        if ($user) {
            $roleNames = '';
    
            $roles = $user->getRoleNames()->toArray();
    
            if (!empty($roles)) {
                $roleNames = implode(', ', $roles);
            }
    
            // Log the logout activity
            activity()
                ->performedOn($user)
                // ->withProperties([
                //     'role' => $roleNames,
                // ])
                ->event('Logout')
                ->log('User logged out');
        }
    
        Auth::guard('web')->logout();
    
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect('/');
    }
    
}
