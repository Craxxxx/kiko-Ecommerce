<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
        /**
     * Handle the incoming login request.
     */
    public function store(Request $request)
    {
        // 1) Validate the form inputs
        $credentials = $request->validate([
            'email'    => 'required|email',
            'password' => 'required|string',
        ]);

        // 2) Attempt to log the user in
        if (Auth::attempt($credentials)) {
            // Regenerate session to prevent fixation
            $request->session()->regenerate();

            // Redirect to the intended page (or dashboard/shop)
            return redirect()->intended(route('dashboard'))
                ->with('success', 'Logged in successfully.');
        }

        // 3) If authentication failed, redirect back with error
        return back()
            ->withErrors(['email' => 'Invalid credentials provided.'])
            ->onlyInput('email');
    }

    /**
     * Log the user out.
     */
    public function destroy(Request $request)
    {
        Auth::logout();

        // Invalidate & regenerate session to be safe
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login.form');
    }

}
