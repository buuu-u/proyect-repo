<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CollectionController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SearchController;
use Illuminate\Support\Facades\Route;


// Rutas para los diferentes tipos de documentos
Route::get('/areas-grado', [DocumentController::class, 'areasGrado'])->name('areas.grado');
Route::get('/tesis', [DocumentController::class, 'tesis'])->name('tesis');
Route::get('/pasantias', [DocumentController::class, 'pasantias'])->name('pasantias');
Route::get('/practicas-profesionales', [DocumentController::class, 'practicasProfesionales'])->name('practicas.profesionales');
Route::get('/servicios-comunitarios', [DocumentController::class, 'serviciosComunitarios'])->name('servicios.comunitarios');
Route::get('/lineas-investigacion', [DocumentController::class, 'lineasInvestigacion'])->name('lineas.investigacion');
Route::get('/document/{id}', [DocumentController::class, 'show'])->name('document.show');

// Añadir la ruta 'about' que falta
Route::get('/about', function () {
    return view('about');
})->name('about');

// Ruta principal
Route::get('/', function () {
    return view('welcome');
})->name('home');

// Incluir rutas de autenticación (solo una vez)
require __DIR__.'/auth.php';

// Rutas de vistas simples
Route::get('register-document', function () {
    return view('registerDocuments');
})->name('register-document');

// Ruta para mostrar detalles de un documento
Route::get('/documents/{document}', [DocumentController::class, 'show'])->name('documents.show');

Route::get('/documents/{document}/view', [DocumentController::class, 'view'])->name('documents.view');

// Añadir esta ruta para la descarga
Route::get('/documents/{document}/download', [DocumentController::class, 'download'])->name('documents.download');

// Route::get('/documents/{document}/share', [DocumentController::class, 'share'])->name('documents.share');

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
Route::get('/busqueda-avanzada', [SearchController::class, 'advanced'])->name('search.advanced');
Route::get('/busqueda/resultados', [SearchController::class, 'results'])->name('search.results');

// Rutas para comentarios
Route::post('/documents/{document}/comments', [App\Http\Controllers\DocumentController::class, 'storeComment'])->name('documents.comments.store')->middleware('auth');
Route::delete('/comments/{comment}', [App\Http\Controllers\DocumentController::class, 'deleteComment'])->name('comments.destroy')->middleware('auth');
