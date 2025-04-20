<?php

namespace App\Http\Controllers;

use App\Models\User_MB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function register(Request $request) {
        return view('register');
    }

    public function login(Request $request) {
        return view('login');
    }

    public function registerCreate(Request $request) {
        $data = $request->only(['name', 'surname', 'email', 'password']);

        // Хешируем пароль
        $data['password'] = Hash::make($data['password']);

        User_MB::create($data);

        return redirect('login');
    }

    public function authentication(Request $request)
    {
        $credentials = $request->only(['email', 'password']);


        $request->session()->regenerate();

        // редирект на страницу профиля
        return redirect()->route('profile.show', ['id' => Auth::user()->id]);



    }

}
