<?php

namespace App\Http\Controllers;

use App\Models\Pengguna;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    function index()
    {
        return view("login");
    }

    function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        $email = $request->input("email");
        $password = $request->input('password');
        $pengguna = Pengguna::query()
            ->where("email", $email)
            ->first();
        if ($pengguna == null || !Hash::check($password, $pengguna->password)) {
            return redirect()
                ->back()
                ->withErrors([
                    "msg" => "Email atau Password salah"
                ])->onlyInput('email');
        }

        if (!session()->isStarted()) session()->start();
        session()->put("logged", true);
        session()->put("idPengguna", $pengguna->id);
        return redirect()->route("blog.index");
    }

    function logout()
    {
        session()->flush();
        return redirect()->route("login");
    }
}
