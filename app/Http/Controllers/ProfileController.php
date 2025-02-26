<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        return view('profile'); // Asegúrate de tener una vista llamada 'profile.blade.php'
    }
}
