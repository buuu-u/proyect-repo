<?php

namespace App\Http\Controllers;

use App\Models\Collection;
use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class DocumentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['show', 'download']);
    }

    public function index()
    {
        $documents = Document::with(['collection', 'user'])
            ->latest()
            ->paginate(20);
            
        return view('documents.index', compact('documents'));
    }

    public function create(Request $request)
    {
        $this->authorize('create', Document::class);
        
        $collectionId = $request->query('collection_id');
        $collection = null;
        
        if ($collectionId) {
            $collection = Collection::findOrFail($collectionId);
            $this->authorize('update', $collection);
        }
        
        $collections = Collection::all();
        
        return view('documents.create', compact('collections', 'collection'));
    }

    public function store(Request $request)
    {
        $this->authorize('create', Document::class);
        
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'file' => 'required|file|max:10240', // 10MB máximo
            'collection_id' => 'required|exists:collections,id',
        ]);
        
        $collection = Collection::findOrFail($validated['collection_id']);
        $this->authorize('update', $collection);
        
        $file = $request->file('file');
        $path = $file->store('documents', 'public');
        
        $document = new Document([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'file_path' => $path,
            'file_type' => $file->getClientMimeType(),
            'file_size' => $file->getSize(),
            'collection_id' => $validated['collection_id'],
            'user_id' => Auth::id(),
        ]);
        
        $document->save();
        
        return redirect()->route('collections.show', $collection)
            ->with('success', 'Documento subido exitosamente.');
    }

    public function show(Document $document)
    {
        $document->incrementViewCount();
        
        return view('documents.show', compact('document'));
    }

    public function edit(Document $document)
    {
        $this->authorize('update', $document);
        
        $collections = Collection::all();
        
        return view('documents.edit', compact('document', 'collections'));
    }

    public function update(Request $request, Document $document)
    {
        $this->authorize('update', $document);
        
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'file' => 'nullable|file|max:10240', // 10MB máximo
            'collection_id' => 'required|exists:collections,id',
        ]);
        
        if ($request->hasFile('file')) {
            // Eliminar el archivo anterior
            Storage::disk('public')->delete($document->file_path);
            
            $file = $request->file('file');
            $path = $file->store('documents', 'public');
            
            $document->file_path = $path;
            $document->file_type = $file->getClientMimeType();
            $document->file_size = $file->getSize();
        }
        
        $document->title = $validated['title'];
        $document->description = $validated['description'];
        $document->collection_id = $validated['collection_id'];
        
        $document->save();
        
        return redirect()->route('documents.show', $document)
            ->with('success', 'Documento actualizado exitosamente.');
    }

    public function destroy(Document $document)
    {
        $this->authorize('delete', $document);
        
        // Eliminar el archivo
        Storage::disk('public')->delete($document->file_path);
        
        $collectionId = $document->collection_id;
        
        $document->delete();
        
        return redirect()->route('collections.show', $collectionId)
            ->with('success', 'Documento eliminado exitosamente.');
    }

    public function download(Document $document)
    {
        $document->incrementDownloadCount();
        
        return Storage::disk('public')->download(
            $document->file_path, 
            $document->title . '.' . pathinfo($document->file_path, PATHINFO_EXTENSION)
        );
    }
}