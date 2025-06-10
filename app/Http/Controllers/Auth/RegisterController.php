<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class RegisterController extends Controller
{
     public function store(Request $request)
    {
        // ✅ Validate input
        $validated = $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email',
            'password' => 'required|string|min:6',
        ]);

        // ✅ Create user
        User::create([
            'name'     => $validated['name'],
            'email'    => $validated['email'],
            'password' => $validated['password'], // auto-hashed by model
        ]);

        // ✅ Redirect to dashboard or login
        return redirect()->route('login.form')->with('success', 'Account created successfully. Please log in.');
    }
}
