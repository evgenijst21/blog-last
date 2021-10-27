<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function __construct() {
        $this->middleware('guest', ['except' => 'logout']);
    }

    
     // Форма входа в личный кабинет
     
    public function login() {
        return view('auth.login');
    }

    // Аутентификация пользователя
     
    public function authenticate(Request $request) {
        $request->validate([
            'login' => 'required|string',
            'password' => 'required|string',
        ]);

        $credentials = $request->only('login', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()
                ->route('admin.post.index')
                ->with('success', 'Вы вошли в личный кабинет');
        }

        return redirect()
            ->route('auth.login')
            ->withErrors('Неверный логин или пароль');
    }

    /**
     * Выход из личного кабинета
     */
    public function logout() {
        Auth::logout();
        return redirect()
            ->route('auth.login')
            ->with('success', 'Вы вышли');
    }
}
