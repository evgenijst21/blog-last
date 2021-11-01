<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function __construct() {
        $this->middleware('guest');
    }

    
    // Форма регистрации
    
    public function register() {
        return view('auth.register');
    }

    // Добавление пользователя
    
    public function create(Request $request) {
        $request->validate([
            'name' => 'required|string|max:255',
            'sur_name' => 'required|string|max:255',
            'login' => 'required|string|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        User::create([
            'name' => $request->name,
            'sur_name' => $request->sur_name, 
            'login' => $request->login,
            'password' => Hash::make($request->password),
        ]);

        return redirect()
            ->route('auth.login')
            ->with('success', 'Вы успешно зарегистрировались');
    }
}
