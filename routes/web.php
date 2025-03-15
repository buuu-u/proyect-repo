<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CollectionController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SearchController;
use Illuminate\Support\Facades\Route;


Route::get('/collection/tesis', function () {
    return view('tesis');
});

Route::get('/collection/pasantias', function () {
    return view('pasantias');
});

Route::get('/collection/area-grado', function () {
    return view('areasGrado');
});

Route::get('/collection/practicas-profesionales', function () {
    return view('practicasProfesionales');
});

Route::get('/collection/servicios-comunitarios', function () {
    return view('serviciosComunitarios');
});

Route::get('/collection/lineas-investigacion', function () {
    return view('lineasInvestigacion');
});

// Ruta principal
Route::get('/', function () {
    return view('welcome');
})->name('home');

// Incluir rutas de autenticación (solo una vez)
require __DIR__.'/auth.php';

// Rutas de vistas simples
Route::get('register-document', function () {
    return view('registerDocuments');
});

// Rutas protegidas (solo para usuarios autenticados)
Route::middleware('auth')->group(function () {
    // Perfil de usuario
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    // Carga de documentos
    Route::post('/upload-document', [DocumentController::class, 'store'])->name('upload.document');
    
    // Rutas protegidas de colecciones
    Route::resource('collections', CollectionController::class)->except(['index', 'show']);
});

// Rutas públicas para colecciones
Route::get('/collection', [CollectionController::class, 'index'])->name('collection');
Route::get('/collections', [CollectionController::class, 'index']);
Route::get('/collections/{collection}', [CollectionController::class, 'show'])->name('collections.show');

// Rutas para documentos
Route::resource('documents', DocumentController::class);
Route::get('documents/{document}/download', [DocumentController::class, 'download'])
    ->name('documents.download');

// Rutas para categorías
Route::resource('categories', CategoryController::class);

// Rutas para búsqueda
Route::get('/search', [SearchController::class, 'index'])->name('search');
Route::get('/search/advanced', [SearchController::class, 'advancedSearch'])->name('search.advanced');