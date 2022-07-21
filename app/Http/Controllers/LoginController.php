<?php

namespace App\Http\Controllers;

use App\Models\Kendaraan;
use App\Models\OrderKendaraan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('logins/login', [
            'title' => 'Login'
        ]);
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {

            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        }

        return back()->with('loginError', 'Login failed!');
    }

    public function logout(Request $request)
    {

        $order_kendaraan = OrderKendaraan::where('user_id', auth()->user()->id)->get();

        foreach ($order_kendaraan as $ok) {
            Kendaraan::where('id', $ok->kendaraan_id)->update(array('available_status' => '1'));
        }

        OrderKendaraan::where('user_id', auth()->user()->id)->delete();

        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
