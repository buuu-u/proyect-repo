<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Mostrar el formulario de login
    public function showLoginForm()
    {
        return view('login');
    }

    // Procesar el login
    public function login(Request $request)
    {
        // Validar los datos del formulario
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Intentar autenticar al usuario
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate(); // Regenerar la sesión
            return redirect()->intended('/'); // Redirigir a la página principal
        }

        // Si la autenticación falla, regresar con un mensaje de error
        return back()->withErrors([
            'email' => 'Las credenciales proporcionadas no coinciden con nuestros registros.',
        ]);
    }

    // Mostrar el formulario de registro
    public function showRegistrationForm()
    {
        return view('register');
    }

    // Procesar el registro
    public function register(Request $request)
    {
        $rules = [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ];

        // Validaciones específicas por tipo de usuario
        switch ($request->user_type) {
            case 'profesor':
                $rules['departamento'] = 'required|string|max:255';
                break;
            case 'estudiante':
                $rules['carrera'] = 'required|string|max:255';
                $rules['matricula'] = 'required|string|max:255';
                break;
            case 'externo':
                $rules['institucion'] = 'required|string|max:255';
                $rules['profesion'] = 'required|string|max:255';
                break;
        }

        $request->validate($rules);

        // Crear el usuario
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'user_type' => $request->user_type,
            'departamento' => $request->departamento ?? null,
            'carrera' => $request->carrera ?? null,
            'matricula' => $request->matricula ?? null,
            'institucion' => $request->institucion ?? null,
            'profesion' => $request->profesion ?? null,
        ]);

        Auth::login($user);

        return response()->json(['success' => true, 'message' => '¡Registro exitoso!']);
    }

    // Cerrar sesión
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
