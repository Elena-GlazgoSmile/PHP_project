<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\User_MB;
use Illuminate\Support\Facades\Log;

class ProfileController extends Controller
{

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $user = Auth::user();
            return redirect()->route('profile.show', ['id' => $user->id]);
        } else {
            return back()->withErrors(['email' => 'Неверный email или пароль.']);
        }
    }

    public function show($id)
    {
        $user = User_MB::findOrFail($id);
        return view('profile.show', compact('user'));
    }

    public function edit($id)
    {
        Log::info('Edit profile ID: ' . $id);
        $user = User_MB::findOrFail($id);
        Log::info('Auth user ID: ' . Auth::id());

        if ($user->id !== Auth::id()) {
            abort(403, 'Unauthorized');
        }

        return view('profile.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'bio' => 'nullable|string|max:1000',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:15',
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $user = User_MB::findOrFail($id);

        $user->name = $request->input('name');
        $user->surname = $request->input('surname');
        $user->bio = $request->input('bio');
        $user->email = $request->input('email');
        $user->phone = $request->input('phone');

        if ($request->hasFile('profile_picture')) {
            $imagePath = $request->file('profile_picture')->store('profile_pictures', 'public');
            $user->profile_picture = $imagePath;
        }

        $user->save();

        return redirect()->route('profile.show', $user->id)->with('success', 'Профиль успешно обновлён!');
    }


    public function loginForm()
    {
        return view('auth.login');
    }
}
