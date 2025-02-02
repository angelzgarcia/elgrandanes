<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showRegisterForm()
    {
        return view('auth.singup');
    }

    public function singup(Request $request)
    {
        $request -> validate([
            'name' => 'required|string|min:3|max:18',
            'lastname' => 'required|string|min:3|max:35',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|max:15',
            'term_cond' => 'required',
        ], [
            'name.required' => 'El nombre es obligatorio.',
            'name.min' => 'El nombre debe tener al menos :min caracteres.',
            'name.max' => 'El nombre no puede tener más de :max caracteres.',

            'lastname.required' => 'Los apellidos son obligatorios.',
            'lastname.min' => 'Los apellidos deben tener al menos :min caracteres.',
            'lastname.max' => 'Los apellidos no pueden tener más de :max caracteres.',

            'email.required' => 'El correo electrónico es obligatorio.',
            'email.email' => 'Debes proporcionar un correo electrónico válido.',
            'email.unique' => 'El correo electrónico ya está registrado.',

            'password.required' => 'La contraseña es obligatoria.',
            'password.min' => 'La contraseña debe tener al menos :min caracteres.',
            'password.max' => 'La contraseña no puede tener más de :max caracteres.',

            'term_cond.required' => 'Marcar la casilla de verificación es obligatorio.',
        ], [
            'name' => 'nombre',
            'lastname' => 'apellidos',
            'email' => 'correo electrónico',
            'password' => 'contraseña',
            'term_cond' => 'términos y condiciones',
        ]);

        $idRol = 1;
        $user = User::create([
            'name' => $request -> name,
            'lastname' => $request -> lastname,
            'email' => $request -> email,
            'password' => Hash::make($request->password),
            'idRol' => $idRol,
        ]);


        return redirect() -> route('login.show') -> with('swal', [
            'icon' => 'success',
            'title' => '¡Cuenta creada con éxito!'
        ]);
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate(rules: [
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);

        if (Auth::attempt($credentials, $request -> has('remember'))) {
            $request->session()->regenerate();

            switch (Auth::user()->idRol) {
                case 2:
                    return redirect()->route('dashboard');
                case 1:
                    return redirect()->route('user.profile.index');
                default:
                    Auth::logout();
                    return back()-> withErrors(['error' => 'No tienes permisos para acceder.']) -> withInput();
            }
        }

        return back()->withErrors(['error' => 'Credenciales incorrectas.']) -> withInput();
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect() -> route('login');
    }

}
