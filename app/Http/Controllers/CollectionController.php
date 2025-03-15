<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class CollectionController extends Controller
{
    use AuthorizesRequests;

    public function index(Request $request)
    {
        // Iniciar la consulta base
        $query = Collection::with('category', 'user')->withCount('documents');
        
        // Aplicar filtro de búsqueda si existe
        if ($request->has('search') && !empty($request->search)) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%");
            });
        }
        
        // Aplicar filtro de categoría si se seleccionó alguna
        if ($request->has('category_id') && !empty($request->category_id)) {
            // Si category_id es un array (cuando se seleccionan múltiples categorías)
            if (is_array($request->category_id)) {
                $query->whereIn('category_id', $request->category_id);
            } else {
                $query->where('category_id', $request->category_id);
            }
        }
        
        // Ordenar y paginar resultados
        $collections = $query->latest()->paginate(9);
        
        // Obtener categorías para el filtro lateral
        $categories = Category::whereNull('parent_id')->with('children')->get();
        
        return view('collection', compact('collections', 'categories'));
    }

    public function create()
    {
        $this->authorize('create', Collection::class);
        
        $categories = Category::all();
        
        return view('collections.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $this->authorize('create', Collection::class);
        
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'thumbnail' => 'nullable|image|max:2048',
            'category_id' => 'nullable|exists:categories,id',
        ]);
        
        if ($request->hasFile('thumbnail')) {
            $path = $request->file('thumbnail')->store('thumbnails', 'public');
            $validated['thumbnail'] = $path;
        }
        
        $validated['user_id'] = Auth::id();
        
        $collection = Collection::create($validated);
        
        return redirect()->route('collections.show', $collection)
            ->with('success', 'Colección creada exitosamente.');
    }

    public function show(Collection $collection)
    {
        $collection->incrementViewCount();
        
        $documents = $collection->documents()
            ->with('user')
            ->latest()
            ->paginate(10);
            
        return view('collections.show', compact('collection', 'documents'));
    }

    public function edit(Collection $collection)
    {
        $this->authorize('update', $collection);
        
        $categories = Category::all();
        
        return view('collections.edit', compact('collection', 'categories'));
    }

    public function update(Request $request, Collection $collection)
    {
        $this->authorize('update', $collection);
        
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'thumbnail' => 'nullable|image|max:2048',
            'category_id' => 'nullable|exists:categories,id',
        ]);
        
        if ($request->hasFile('thumbnail')) {
            // Eliminar la imagen anterior si existe
            if ($collection->thumbnail) {
                Storage::disk('public')->delete($collection->thumbnail);
            }
            
            $path = $request->file('thumbnail')->store('thumbnails', 'public');
            $validated['thumbnail'] = $path;
        }
        
        $collection->update($validated);
        
        return redirect()->route('collections.show', $collection)
            ->with('success', 'Colección actualizada exitosamente.');
    }

    public function destroy(Collection $collection)
    {
        $this->authorize('delete', $collection);
        
        // Eliminar la imagen de miniatura si existe
        if ($collection->thumbnail) {
            Storage::disk('public')->delete($collection->thumbnail);
        }
        
        // Los documentos y sus archivos se eliminarán en cascada
        // pero podríamos manejar la eliminación de archivos aquí también
        
        $collection->delete();
        
        return redirect()->route('collections.index')
            ->with('success', 'Colección eliminada exitosamente.');
    }
}