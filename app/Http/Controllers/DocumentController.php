<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DocumentController extends Controller
{
    // DocumentController.php
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'abstract' => 'required|string',
            'documentFile' => 'required|file|mimes:pdf,doc,docx|max:2048',
        ]);

        $filePath = $request->file('documentFile')->store('documents');

        Document::create([
            'title' => $request->title,
            'author' => $request->author,
            'abstract' => $request->abstract,
            'file_path' => $filePath,
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('collection')->with('success', 'Documento subido exitosamente.');
    }
}
