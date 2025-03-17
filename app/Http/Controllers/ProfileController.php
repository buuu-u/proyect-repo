<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Document;

class ProfileController extends Controller
{
    public function index()
    {
        return view('perfil');
    }

    public function update(Request $request)
    {
        // Get the user model directly instead of through Auth facade
        $user = User::find(Auth::id());
        
        if (!$user) {
            return redirect()->back()->with('error', 'Usuario no encontrado');
        }
        
        // Validate the request
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8|confirmed',
            'departamento' => 'nullable|string|max:255',
            'carrera' => 'nullable|string|max:255',
            'matricula' => 'nullable|string|max:255',
            'institucion' => 'nullable|string|max:255',
            'ocupacion' => 'nullable|string|max:255',
            'bio' => 'nullable|string',
        ]);
        
        // Update user information
        $user->name = $validated['name'];
        $user->email = $validated['email'];
        
        // Inicializar profile_data si es null
        $profileData = $user->profile_data ?? [];
        
        // Guardar bio en profile_data
        if (isset($validated['bio'])) {
            $profileData['bio'] = $validated['bio'];
            $user->profile_data = $profileData;
        }
        
        // Update type-specific fields
        if ($user->user_type == 'profesor' && isset($validated['departamento'])) {
            $user->departamento = $validated['departamento'];
        }
        
        if ($user->user_type == 'estudiante') {
            if (isset($validated['carrera'])) {
                $user->carrera = $validated['carrera'];
            }
            if (isset($validated['matricula'])) {
                $user->matricula = $validated['matricula'];
            }
        }
        
        if ($user->user_type == 'externo') {
            if (isset($validated['institucion'])) {
                $user->institucion = $validated['institucion'];
            }
            if (isset($validated['ocupacion'])) {
                // Nota: en tu modelo tienes 'profesion', no 'ocupacion'
                $user->profesion = $validated['ocupacion'];
            }
        }
        
        // Update password if provided
        if (!empty($validated['password'])) {
            $user->password = Hash::make($validated['password']);
        }
        
        $user->save();
        
        return redirect()->route('profile')->with('success', 'Perfil actualizado correctamente');
    }

    public function destroy(Document $document)
    {
        // Check authorization
        $this->authorize('delete', $document);
        
        // Delete the document
        $document->delete();
        
        // Check if we should redirect back to profile
        if (request('redirect_to') === 'profile') {
            return redirect()->route('profile')->with('success', 'Documento eliminado correctamente');
        }
        
        // Default redirect
        return redirect()->route('documents.index')->with('success', 'Documento eliminado correctamente');
    }
}