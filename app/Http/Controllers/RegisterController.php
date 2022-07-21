<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
    public function index()
    {
        return view('logins/register', [
            'title' => 'Register'
        ]);
    }

    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'alamat' => 'required|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|max:255',
            'foto' => 'image'
        ]);

        if ($request->file('foto') != null) {

            $validatedData = ([
                'name' => $request->input('name'),
                'alamat' => $request->input('alamat'),
                'email' => $request->input('email'),
                'password' => $request->input('password'),
                'foto_profile' => $request->file('foto')->store('foto-profile-images')
            ]);

            $validatedData['password'] = bcrypt($validatedData['password']);

            User::create($validatedData);
        } else {
            $validatedData = ([
                'name' => $request->input('name'),
                'alamat' => $request->input('alamat'),
                'email' => $request->input('email'),
                'password' => $request->input('password'),
                'foto_profile' => 'foto-profile-images/profile_default.png'
            ]);

            $validatedData['password'] = bcrypt($validatedData['password']);

            User::create($validatedData);
        }

        return redirect('/login')->with('success', 'Registration seccessfull! Please login');
    }
}
