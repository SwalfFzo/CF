<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
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

        $u = $request->user();

        if ($u->hasAnyRole(['admin', 'event_manager', 'content_editor'])) {
            return redirect()->intended('/admin.dashboard');   // لوحة الإدارة
        }

        if ($u->hasRole('trainer')) {
            return redirect()->intended('/trainer'); // لوحة المدرب
        }

        return redirect()->intended('/trainee');     // لوحة المتدرب
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }


    // تخصيص Redirect في كنترولر الجلسة
    protected function authenticated($request, $user)
    {
        if ($user->hasRole('admin') || $user->hasAnyRole(['content_editor', 'event_manager'])) {
            return redirect()->intended('/admin');
        }
        return redirect()->intended('/'); // المستخدم العادي
    }
}
