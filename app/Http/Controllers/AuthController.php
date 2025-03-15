<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rules;

class AuthController extends Controller
{
    /**
     * Muestra el formulario de inicio de sesión
     */
    public function showLoginForm()
    {
        return view('login');
    }

    /**
     * Maneja el intento de inicio de sesión
     */
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string'],
        ]);

        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();

            return redirect()->intended('/');
        }

        return back()->withErrors([
            'email' => 'Las credenciales proporcionadas no coinciden con nuestros registros.',
        ])->onlyInput('email');
    }

    /**
     * Muestra el formulario de registro
     */
    public function showRegistrationForm()
    {
        return view('register');
    }

    /**
     * Maneja el registro de un nuevo usuario
     */
    public function register(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'user_type' => ['required', 'string', 'in:profesor,estudiante,externo'],
        ]);

        // Preparar los datos del usuario
        $userData = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'user_type' => $request->user_type,
        ];
        
        // Añadir campos específicos según el tipo de usuario
        if ($request->user_type === 'profesor') {
            $request->validate([
                'departamento' => ['required', 'string', 'max:255'],
            ]);
            $userData['departamento'] = $request->departamento;
        } elseif ($request->user_type === 'estudiante') {
            $request->validate([
                'carrera' => ['required', 'string', 'max:255'],
                'matricula' => ['required', 'string', 'max:255'],
            ]);
            $userData['carrera'] = $request->carrera;
            $userData['matricula'] = $request->matricula;
        } elseif ($request->user_type === 'externo') {
            $request->validate([
                'institucion' => ['required', 'string', 'max:255'],
                'profesion' => ['required', 'string', 'max:255'],
            ]);
            $userData['institucion'] = $request->institucion;
            $userData['profesion'] = $request->profesion;
        }

        try {
            // Usar transacción para garantizar la integridad de los datos
            DB::beginTransaction();
            
            $user = User::create($userData);

            // Asignar rol según el tipo de usuario
            $roleName = match ($request->user_type) {
                'profesor' => 'profesor',
                'estudiante' => 'estudiante',
                'externo' => 'externo',
                default => 'externo',
            };

            $role = Role::where('slug', $roleName)->first();
            if ($role) {
                $user->roles()->attach($role);
            }
            
            // Crear preferencias de notificación por defecto si existe la relación
            if (method_exists($user, 'notificationPreferences')) {
                $user->notificationPreferences()->create([
                    'new_documents' => true,
                    'document_comments' => true,
                    'system_updates' => true,
                    'email_notifications' => true,
                ]);
            }
            
            DB::commit();
            
            Auth::login($user);

            return redirect('/')->with('success', '¡Registro exitoso! Bienvenido a nuestro repositorio académico.');
            
        } catch (\Exception $e) {
            DB::rollBack();
            
            // Registrar el error para depuración
            Log::error('Error en registro de usuario: ' . $e->getMessage());
            
            return back()
                ->withInput()
                ->withErrors(['general' => 'Ha ocurrido un error al registrar su cuenta: ' . $e->getMessage()]);
        }
    }

    /**
     * Cierra la sesión del usuario
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}