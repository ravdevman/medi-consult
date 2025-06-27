<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    function store(Request $request)
    {
        $request->validate([
            'firstName' => 'required|string|max:255',
            'lastName' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'CIN' => 'required|string|max:20|unique:patients,CIN',
            'birthDate' => 'required|date',
        ]);

        $user = User::create([
            'firstName' => $request->firstName,
            'lastName' => $request->lastName,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'patient',
        ]);

        Patient::create([
            'user_id' => $user->id,
            'CIN' => $request->CIN,
            'birthDate' => $request->birthDate,
        ]);

        Auth::login($user);

        return redirect('/')->with('success', 'Bienvenue sur Medi Consult !');
    }
}
