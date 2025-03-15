<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        // Obtener categorías para los filtros
        $categories = Category::all();
        
        // Inicializar la consulta
        $query = Document::query();
        
        // Aplicar filtro de búsqueda por texto
        if ($request->has('q') && !empty($request->q)) {
            $searchTerm = $request->q;
            $query->where(function($q) use ($searchTerm) {
                $q->where('title', 'LIKE', "%{$searchTerm}%")
                  ->orWhere('description', 'LIKE', "%{$searchTerm}%")
                  ->orWhereHas('user', function($userQuery) use ($searchTerm) {
                      $userQuery->where('name', 'LIKE', "%{$searchTerm}%");
                  });
            });
        }
        
        // Filtrar por categoría
        if ($request->has('category_id') && !empty($request->category_id)) {
            $query->whereHas('collection', function($q) use ($request) {
                $q->where('category_id', $request->category_id);
            });
        }
        
        // Filtrar por tipo de documento
        if ($request->has('document_type') && !empty($request->document_type)) {
            $query->where('document_type', $request->document_type);
        }
        
        // Filtrar por fecha (desde)
        if ($request->has('date_from') && !empty($request->date_from)) {
            $query->whereDate('created_at', '>=', $request->date_from);
        }
        
        // Filtrar por fecha (hasta)
        if ($request->has('date_to') && !empty($request->date_to)) {
            $query->whereDate('created_at', '<=', $request->date_to);
        }
        
        // Filtrar por autor (usuario)
        if ($request->has('author_id') && !empty($request->author_id)) {
            $query->where('user_id', $request->author_id);
        }
        
        // Ordenar resultados
        $sortField = $request->sort_by ?? 'created_at';
        $sortDirection = $request->sort_direction ?? 'desc';
        $query->orderBy($sortField, $sortDirection);
        
        // Obtener resultados paginados
        $documents = $query->with(['user', 'collection.category'])->paginate(10);
        
        // Obtener autores para el filtro
        $authors = User::whereHas('documents')->select('id', 'name')->get();
        
        // Tipos de documentos para el filtro
        $documentTypes = [
            'tesis' => 'Tesis',
            'pasantia' => 'Pasantía',
            'area_grado' => 'Área de Grado',
            'proyecto_investigacion' => 'Proyecto de Investigación',
            'practicas_profesionales' => 'Prácticas Profesionales',
            'servicio_comunitario' => 'Servicio Comunitario',
        ];
        
        return view('search.index', compact(
            'documents', 
            'categories', 
            'authors', 
            'documentTypes',
            'request'
        ));
    }
    
    public function advancedSearch()
    {
        $categories = Category::all();
        $authors = User::whereHas('documents')->select('id', 'name')->get();
        
        $documentTypes = [
            'tesis' => 'Tesis',
            'pasantia' => 'Pasantía',
            'area_grado' => 'Área de Grado',
            'proyecto_investigacion' => 'Proyecto de Investigación',
            'practicas_profesionales' => 'Prácticas Profesionales',
            'servicio_comunitario' => 'Servicio Comunitario',
        ];
        
        return view('search.advanced', compact('categories', 'authors', 'documentTypes'));
    }
}