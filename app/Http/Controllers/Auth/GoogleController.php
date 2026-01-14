<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Str;

class GoogleController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callback()
    {
        $googleUser = Socialite::driver('google')->stateless()->user();

        $user = User::where('google_id', $googleUser->id)->first();

        if (!$user) {

            $user = User::where('email', $googleUser->email)->first();

            if ($user) {
                $user->update([
                    'google_id' => $googleUser->id,
                    'avatar' => $googleUser->avatar,
                ]);
            } else {
                $user = User::create([
                    'name' => $googleUser->name,
                    'email' => $googleUser->email,
                    'google_id' => $googleUser->id,
                    'avatar' => $googleUser->avatar,
                    'role' => 'peminjam',
                    'status' => 'pending',
                    'password' => bcrypt(Str::random(16)),
                ]);
            }
        }

        if ($user->status !== 'approve') {
            return redirect('/login')->withErrors([
                'email' => 'Akun Anda masih menunggu persetujuan Admin.'
            ]);
        }

        Auth::login($user);

        if ($user->role === 'admin') {
            return redirect('/admin/dashboard');
        }

        return redirect('/peminjam/ruangan');
    }
}
