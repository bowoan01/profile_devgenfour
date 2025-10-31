<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function edit(): View
    {
        return view('admin.profile.edit', ['user' => Auth::user()]);
    }

    public function update(): RedirectResponse
    {
        $user = Auth::user();

        request()->validate([
            'name' => ['required', 'string', 'max:120'],
            'email' => ['required', 'email', 'max:190', 'unique:users,email,'.$user->id],
            'password' => ['nullable', 'string', 'min:8', 'confirmed'],
        ]);

        $user->fill(request()->only('name', 'email'));

        if (request('password')) {
            $user->password = Hash::make(request('password'));
        }

        $user->save();

        return redirect()->route('admin.profile.edit')->with('status', 'Profil berhasil diperbarui.');
    }
}
