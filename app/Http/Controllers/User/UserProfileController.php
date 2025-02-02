<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserProfileController extends Controller
{
    public function index()
    {
        $sessions = DB::table('sessions')
                        -> where('user_id', Auth::user() -> id)
                        -> limit(2)
                        -> get();

        foreach ($sessions as $session) {
            $session -> last_activity = \Carbon\Carbon::parse($session->last_activity) -> diffForHumans();
            $osDetails = preg_match('/\((.*?)\)/', $session -> user_agent, $os);
            $session -> os = str_replace('(', '', explode(';', $os[0])[0]);
            $browserDetails = preg_match('/Chrome\/[\d\.]+|Safari\/[\d\.]+|Firefox\/[\d\.]+/', $session -> user_agent, $browser);
            $session -> browser = explode('/', $browser[0])[0];
        }

        return view('users.profile.index', compact('sessions'));
    }

    public function updateProfile(Request $request, $id)
    {
        $user = User::find($id) -> first();

        $request -> validate([
            'name' => 'required|string|min:3|max:18',
            'lastname' => 'required|string|min:3|max:35',
            'email' => [
                'required',
                'email',
                Rule::unique('users', 'email') -> ignore($user->id)
            ],
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
        ], [
            'name' => 'nombre',
            'lastname' => 'apellidos',
            'email' => 'correo electrónico',
        ]);

        if (!$user->exists()) return redirect() -> route('user.profile.index');

        $user -> update([
            'name' => $request -> name,
            'lastname' => $request -> lastname,
            'email' => $request -> email
        ]);

        return redirect() -> route('user.profile.index') -> with('success', '¡Perfil actualizado!');
    }

    public function updatePassword(Request $request, $id )
    {
        $request -> validate([
            'current-pass' => 'required|string|max:20|min:8',
            'new-pass' => 'required|required_with:new-pass-confirm|same:new-pass-confirm|string|max:20|min:8',
            'new-pass-confirm' => 'required|string|max:20|min:8'
        ], [
            'current-pass.required' => 'Debes ingresar tu contraseña actual.',
            'new-pass.required_with' => 'Debes ingresar una nueva contraseña.',
            'new-pass.required' => 'Debes ingresar una nueva contraseña.',
            'new-pass.min' => 'La contraseña debe tener al menos 8 caracteres.',
            'new-pass.max' => 'La contraseña debe tener como máximo 20 caracteres.',
            'new-pass.same' => 'Las contraseñas no coinciden.',
            'new-pass-confirm.required' => 'La confirmación de la contraseña es obbligatoria.',
        ], [

        ]);

        $id = Auth::user() -> id;
        $user = User::find($id);

        if(!Hash::check($request->input('current-pass'), $user -> password))
            return back() -> withErrors(['current-pass' => 'La contraseña actual no es correcta.']);

        $user -> update([
            'password' => Hash::make($request->input('new-pass')),
        ]);

        return back() -> with('success', '¡Contraseña actualizada!');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect() -> route('login');
    }

}
