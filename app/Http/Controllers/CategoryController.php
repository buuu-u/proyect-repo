<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    public function index()
    {
        $categories = Category::withCount('collections')
            ->whereNull('parent_id')
            ->with(['children' => function ($query) {
                $query->withCount('collections');
            }])
            ->get();
            
        return view('categories.index', compact('categories'));
    }

    public function create()
    {
        $this->authorize('create', Category::class);
        
        $categories = Category::whereNull('parent_id')->with('children')->get();
        
        return view('categories.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $this->authorize('create', Category::class);
        
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'parent_id' => 'nullable|exists:categories,id',
        ]);
        
        $validated['slug'] = Str::slug($validated['name']);
        
        Category::create($validated);
        
        return redirect()->route('categories.index')
            ->with('success', 'Categoría creada exitosamente.');
    }

    public function show(Category $category)
    {
        $collections = $category->collections()
            ->withCount('documents')
            ->with('user')
            ->latest()
            ->paginate(9);
            
        return view('categories.show', compact('category', 'collections'));
    }

    public function edit(Category $category)
    {
        $this->authorize('update', $category);
        
        $categories = Category::whereNull('parent_id')
            ->where('id', '!=', $category->id)
            ->with('children')
            ->get();
            
        return view('categories.edit', compact('category', 'categories'));
    }

    public function update(Request $request, Category $category)
    {
        $this->authorize('update', $category);
        
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'parent_id' => 'nullable|exists:categories,id',
        ]);
        
        // Evitar ciclos en la jerarquía de categorías
        if ($validated['parent_id'] && $category->id == $validated['parent_id']) {
            return back()->withErrors(['parent_id' => 'Una categoría no puede ser su propio padre.']);
        }
        
        $validated['slug'] = Str::slug($validated['name']);
        
        $category->update($validated);
        
        return redirect()->route('categories.index')
            ->with('success', 'Categoría actualizada exitosamente.');
    }

    public function destroy(Category $category)
    {
        $this->authorize('delete', $category);
        
        // Verificar si tiene colecciones
        if ($category->collections()->count() > 0) {
            return back()->withErrors(['general' => 'No se puede eliminar una categoría que tiene colecciones.']);
        }
        
        // Verificar si tiene categorías hijas
        if ($category->children()->count() > 0) {
            return back()->withErrors(['general' => 'No se puede eliminar una categoría que tiene subcategorías.']);
        }
        
        $category->delete();
        
        return redirect()->route('categories.index')
            ->with('success', 'Categoría eliminada exitosamente.');
    }
}