<?php

namespace App\Http\Controllers;

use App\Models\Collection;
use App\Models\Document;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class DocumentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['show', 'download']);
    }

    public function index()
    {
        // Get counts of each document type
        $documentTypeCounts = Document::select('document_type')
            ->selectRaw('count(*) as count')
            ->groupBy('document_type')
            ->pluck('count', 'document_type')
            ->toArray();

        // Get the latest documents, still paginated, but without collection relationship
        $documents = Document::with(['user'])
            ->latest()
            ->paginate(20);

        return view('/collection', compact('documents', 'documentTypeCounts'));
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
            'abstract' => 'nullable|string',
            'author' => 'nullable|string|max:255',
            'document_type' => 'required|string|max:50',
            'file' => 'required|file|max:10240', // 10MB máximo
            // 'collection_id' => 'required|nullable|exists:collections,id', // Changed from 'required' to 'nullable'
            'faculty' => 'nullable|string|max:100',
            'category' => 'nullable|string|max:100',
            'level' => 'nullable|string|max:50',
            'company' => 'nullable|string|max:255',
            'duration' => 'nullable|string|max:100',
            'keywords' => 'nullable|array',
            'keywords.*' => 'nullable|string|max:50',
            // Nuevos campos de metadatos
            'director' => 'nullable|string|max:255',
            'co_director' => 'nullable|string|max:255',
            'academic_degree' => 'nullable|string|max:100',
            'institution' => 'nullable|string|max:255',
            'department' => 'nullable|string|max:255',
            'publication_date' => 'nullable|date',
            'defense_date' => 'nullable|date',
            'language' => 'nullable|string|max:50',
            'page_count' => 'nullable|integer',
            'identifier' => 'nullable|string|max:255',
            'rights' => 'nullable|string|max:255'
        ]);

        // If collection_id is provided, check authorization
        if (isset($validated['collection_id'])) {
            $collection = Collection::findOrFail($validated['collection_id']);
            $this->authorize('update', $collection);
        }

        // Procesar las palabras clave
        $keywords = '';
        if ($request->has('keywords') && is_array($request->keywords)) {
            // Filtrar valores vacíos y unir con comas
            $keywordsArray = array_filter($request->keywords, function ($value) {
                return !empty(trim($value));
            });
            $keywords = implode(', ', $keywordsArray);
        }

        $file = $request->file('file');
        $path = $file->store('documents', 'public');

        $document = new Document([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'abstract' => $validated['abstract'] ?? null,
            'author' => $validated['author'] ?? null,
            'document_type' => $validated['document_type'],
            'file_path' => $path,
            'file_type' => $file->getClientMimeType(),
            'file_size' => $file->getSize(),
            'user_id' => Auth::id(),
            'faculty' => $validated['faculty'] ?? null,
            'category' => $validated['category'] ?? null,
            'keywords' => $keywords,
            // 'collection_id' => $validated['collection_id'] ?? null, // Set to null if not provided
            // Nuevos campos de metadatos
            'director' => $validated['director'] ?? null,
            'co_director' => $validated['co_director'] ?? null,
            'academic_degree' => $validated['academic_degree'] ?? null,
            'institution' => $validated['institution'] ?? null,
            'department' => $validated['department'] ?? null,
            'publication_date' => $validated['publication_date'] ?? null,
            'defense_date' => $validated['defense_date'] ?? null,
            'language' => $validated['language'] ?? 'Español',
            'page_count' => $validated['page_count'] ?? null,
            'identifier' => $validated['identifier'] ?? null,
            'rights' => $validated['rights'] ?? null
        ]);

        // Agregar campos específicos según el tipo de documento
        if ($validated['document_type'] === 'tesis' && isset($validated['level'])) {
            $document->level = $validated['level'];
        }

        if ($validated['document_type'] === 'pasantia') {
            $document->company = $validated['company'] ?? null;
            $document->duration = $validated['duration'] ?? null;
        }

        if ($validated['document_type'] === 'innovacion') {
            $document->sector = $validated['sector'] ?? null;
            $document->impact_area = $validated['impact_area'] ?? null;
        }

        // Extraer la tabla de contenidos si es un PDF o Word
        if (
            strpos($file->getClientMimeType(), 'pdf') !== false ||
            strpos($file->getClientMimeType(), 'word') !== false ||
            strpos($file->getClientMimeType(), 'doc') !== false
        ) {
            $tableOfContents = $this->extractTableOfContents($file->getPathname(), $file->getClientMimeType());
            $document->table_of_contents = json_encode($tableOfContents);
        }

        $document->save();

        // Redirect based on document type
        $route = '/collection'; // Default route

        switch ($validated['document_type']) {
            case 'area_grado':
                $route = 'areas.grado';
                break;
            case 'tesis':
                $route = 'tesis';
                break;
            case 'pasantia':
                $route = 'pasantias';
                break;
            case 'practicas_profesionales':
                $route = 'practicas.profesionales';
                break;
            case 'servicio_comunitario':
                $route = 'servicios.comunitarios';
                break;
            case 'lineas_investigacion':
                $route = 'lineas.investigacion';
                break;
            case 'innovacion':
                $route = 'innovacion';
                break;
        }

        return redirect()->route($route)
            ->with('success', 'Documento subido exitosamente.');
    }

    public function show(Document $document)
    {
        // Incrementar contador de vistas
        $document->incrementViewCount();

        // Obtener documentos relacionados (mismo tipo o categoría o keywords)
        $relatedDocuments = Document::where('id', '!=', $document->id)
            ->where(function ($query) use ($document) {
                // Match by document type
                $query->where('document_type', $document->document_type);

                // Match by category if available
                if ($document->category) {
                    $query->orWhere('category', $document->category);
                }

                // Match by keywords if available
                if ($document->keywords) {
                    $keywordsArray = explode(',', $document->keywords);
                    foreach ($keywordsArray as $keyword) {
                        $keyword = trim($keyword);
                        if (!empty($keyword)) {
                            $query->orWhere('keywords', 'like', '%' . $keyword . '%');
                        }
                    }
                }
            })
            ->latest()
            ->limit(5)
            ->get();

        // If no related documents found, get the most recent documents of the same type
        if ($relatedDocuments->isEmpty()) {
            $relatedDocuments = Document::where('id', '!=', $document->id)
                ->where('document_type', $document->document_type)
                ->latest()
                ->limit(5)
                ->get();

            // If still empty, just get the most recent documents
            if ($relatedDocuments->isEmpty()) {
                $relatedDocuments = Document::where('id', '!=', $document->id)
                    ->latest()
                    ->limit(5)
                    ->get();
            }
        }

        return view('detalleDocument', compact('document', 'relatedDocuments'));
    }

    public function update(Request $request, Document $document)
    {
        $this->authorize('update', $document);

        $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'description' => 'required|string',
            'document_type' => 'nullable|string',
            'category' => 'nullable|string',
            'file' => 'nullable|file|mimes:pdf,doc,docx,ppt,pptx,xls,xlsx|max:10240',
            'keywords' => 'nullable|array',
            'keywords.*' => 'nullable|string|max:50',
            // Nuevos campos de metadatos
            'director' => 'nullable|string|max:255',
            'co_director' => 'nullable|string|max:255',
            'academic_degree' => 'nullable|string|max:100',
            'institution' => 'nullable|string|max:255',
            'department' => 'nullable|string|max:255',
            'publication_date' => 'nullable|date',
            'defense_date' => 'nullable|date',
            'language' => 'nullable|string|max:50',
            'page_count' => 'nullable|integer',
            'identifier' => 'nullable|string|max:255',
            'rights' => 'nullable|string|max:255',
        ]);

        // Procesar las palabras clave
        $keywords = '';
        if ($request->has('keywords') && is_array($request->keywords)) {
            // Filtrar valores vacíos y unir con comas
            $keywordsArray = array_filter($request->keywords, function ($value) {
                return !empty(trim($value));
            });
            $keywords = implode(', ', $keywordsArray);
        }

        // Actualizar los datos del documento
        $document->title = $request->title;
        $document->author = $request->author;
        $document->description = $request->description;
        $document->document_type = $request->document_type;
        $document->category = $request->category;
        $document->keywords = $keywords;

        // Actualizar metadatos
        $document->director = $request->director;
        $document->co_director = $request->co_director;
        $document->academic_degree = $request->academic_degree;
        $document->institution = $request->institution;
        $document->department = $request->department;
        $document->publication_date = $request->publication_date;
        $document->defense_date = $request->defense_date;
        $document->language = $request->language;
        $document->page_count = $request->page_count;
        $document->identifier = $request->identifier;
        $document->rights = $request->rights;

        // Procesar el archivo si se ha subido uno nuevo
        if ($request->hasFile('file')) {
            // Eliminar el archivo anterior
            if ($document->file_path) {
                Storage::disk('public')->delete($document->file_path);
            }

            // Guardar el nuevo archivo
            $file = $request->file('file');
            $filePath = $file->store('documents', 'public');

            $document->file_path = $filePath;
            $document->file_name = $file->getClientOriginalName();
            $document->file_type = $file->getMimeType();
            $document->file_size = $file->getSize();

            // Extraer la tabla de contenidos si es un PDF o Word
            if (
                strpos($file->getMimeType(), 'pdf') !== false ||
                strpos($file->getMimeType(), 'word') !== false ||
                strpos($file->getMimeType(), 'doc') !== false
            ) {
                $tableOfContents = $this->extractTableOfContents($file->getPathname(), $file->getMimeType());
                $document->table_of_contents = json_encode($tableOfContents);
            } else {
                // Si no es un tipo de archivo compatible, limpiar la tabla de contenidos existente
                $document->table_of_contents = null;
            }
        }

        $document->save();

        return redirect()->route('documents.show', $document)->with('success', 'Documento actualizado correctamente');
    }

    public function destroy(Document $document)
    {
        // Verificar permisos
        $this->authorize('delete', $document);

        // Guardar información antes de eliminar
        $documentType = $document->document_type;

        // Eliminar el documento
        $document->delete();

        // Redireccionar basado en el tipo de documento
        if ($documentType) {
            switch ($documentType) {
                case 'tesis':
                    return redirect()->route('tesis')->with('success', 'Documento eliminado correctamente');
                case 'area_grado':
                    return redirect()->route('areas.grado')->with('success', 'Documento eliminado correctamente');
                case 'pasantia':
                    return redirect()->route('pasantias')->with('success', 'Documento eliminado correctamente');
                case 'practicas_profesionales':
                    return redirect()->route('practicas.profesionales')->with('success', 'Documento eliminado correctamente');
                case 'servicio_comunitario':
                    return redirect()->route('servicios.comunitarios')->with('success', 'Documento eliminado correctamente');
                case 'lineas_investigacion':
                    return redirect()->route('lineas.investigacion')->with('success', 'Documento eliminado correctamente');
                default:
                    return redirect()->route('collection')->with('success', 'Documento eliminado correctamente');
            }
        }

        // Si no hay tipo de documento, redirigir a la página principal de colecciones
        return redirect()->route('collection')->with('success', 'Documento eliminado correctamente');
    }

    /**
     * Download the specified document.
     *
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function download(Document $document)
    {
        // Incrementar el contador de descargas
        $document->increment('downloads_count');

        // Obtener la ruta del archivo
        $filePath = storage_path('app/public/' . $document->file_path);

        // Verificar si el archivo existe
        if (!file_exists($filePath)) {
            return redirect()->back()->with('error', 'El archivo no se encuentra disponible para descarga.');
        }

        // Determinar la extensión correcta basada en el archivo original
        $originalExtension = pathinfo($document->file_path, PATHINFO_EXTENSION);

        // Si la extensión está vacía o no es válida, intentamos determinarla por el tipo MIME
        if (empty($originalExtension) || !in_array($originalExtension, ['pdf', 'doc', 'docx'])) {
            // Verificar el tipo MIME para determinar la extensión
            if (strpos($document->file_type, 'pdf') !== false) {
                $originalExtension = 'pdf';
            } elseif (
                strpos($document->file_type, 'word') !== false ||
                strpos($document->file_type, 'docx') !== false
            ) {
                $originalExtension = 'docx';
            } elseif (
                strpos($document->file_type, 'msword') !== false ||
                strpos($document->file_type, 'doc') !== false
            ) {
                $originalExtension = 'doc';
            } else {
                // Si no podemos determinar el tipo, usamos la extensión original o pdf como fallback
                $originalExtension = $originalExtension ?: 'pdf';
            }
        }

        // Generar un nombre de archivo para la descarga con la extensión correcta
        $fileName = Str::slug($document->title) . '.' . $originalExtension;

        // Para depuración, registrar información sobre el archivo
        Log::info('Descargando archivo', [
            'file_path' => $document->file_path,
            'file_type' => $document->file_type,
            'detected_extension' => $originalExtension,
            'download_filename' => $fileName
        ]);

        // Devolver el archivo para descarga
        return response()->download($filePath, $fileName);
    }

    /**
     * Visualiza un documento en el navegador
     * 
     * @param Document $document
     * @return \Illuminate\Http\Response
     */
    public function view(Document $document)
    {
        // For PDF files, display directly
        if (strpos($document->file_type, 'pdf') !== false) {
            $path = storage_path('app/public/' . $document->file_path);
            return response()->file($path, [
                'Content-Type' => 'application/pdf',
                'Content-Disposition' => 'inline; filename="' . $document->title . '.pdf"'
            ]);
        }

        // For Word documents, convert to PDF first
        if (
            strpos($document->file_type, 'word') !== false ||
            strpos($document->file_type, 'doc') !== false ||
            strpos($document->file_path, '.doc') !== false ||
            strpos($document->file_path, '.docx') !== false
        ) {

            $pdfPath = $this->convertToPdf($document);

            if ($pdfPath) {
                return response()->file($pdfPath, [
                    'Content-Type' => 'application/pdf',
                    'Content-Disposition' => 'inline; filename="' . $document->title . '.pdf"'
                ]);
            }
        }

        // If we can't display it, download it
        return redirect()->route('documents.download', $document);
    }

    /**
     * Convert a Word document to PDF for viewing
     * 
     * @param Document $document
     * @return string|null Path to the PDF file or null if conversion failed
     */
    private function convertToPdf(Document $document)
    {
        try {
            $inputPath = storage_path('app/public/' . $document->file_path);
            $filename = pathinfo($document->file_path, PATHINFO_FILENAME);
            $outputDir = storage_path('app/public/documents/pdf');

            // Create output directory if it doesn't exist
            if (!file_exists($outputDir)) {
                mkdir($outputDir, 0755, true);
            }

            $outputPath = $outputDir . '/' . $filename . '.pdf';

            // Check if converted file already exists
            if (file_exists($outputPath)) {
                return $outputPath;
            }

            // Convert using LibreOffice
            $command = 'libreoffice --headless --convert-to pdf --outdir ' .
                escapeshellarg(dirname($outputPath)) . ' ' .
                escapeshellarg($inputPath) . ' 2>&1';

            exec($command, $output, $returnVar);

            if ($returnVar !== 0) {
                Log::error('Error converting document to PDF: ' . implode("\n", $output));
                return null;
            }

            return $outputPath;
        } catch (\Exception $e) {
            Log::error('Exception converting document to PDF: ' . $e->getMessage());
            return null;
        }
    }

    /**
     * Extrae la tabla de contenidos de un archivo PDF o Word
     * 
     * @param string $filePath Ruta al archivo
     * @param string $mimeType Tipo MIME del archivo
     * @return array Tabla de contenidos en formato [título => página]
     */
    private function extractTableOfContents($filePath, $mimeType = null)
    {
        try {
            // Si es un PDF
            if (strpos($mimeType, 'pdf') !== false || pathinfo($filePath, PATHINFO_EXTENSION) === 'pdf') {
                return $this->extractTableOfContentsFromPdf($filePath);
            }

            // Si es un documento Word
            if (
                strpos($mimeType, 'word') !== false ||
                strpos($mimeType, 'doc') !== false ||
                pathinfo($filePath, PATHINFO_EXTENSION) === 'doc' ||
                pathinfo($filePath, PATHINFO_EXTENSION) === 'docx'
            ) {
                return $this->extractTableOfContentsFromWord($filePath);
            }

            // Para otros tipos de archivo, devolver array vacío
            return [];
        } catch (\Exception $e) {
            Log::error('Error al extraer la tabla de contenidos: ' . $e->getMessage());
            return [];
        }
    }

    /**
     * Extrae la tabla de contenidos de un archivo PDF
     * 
     * @param string $filePath Ruta al archivo PDF
     * @return array Tabla de contenidos en formato [título => página]
     */
    private function extractTableOfContentsFromPdf($filePath)
    {
        // Implementación básica usando pdftotext (requiere poppler-utils instalado)
        $output = [];
        exec("pdftotext -layout '{$filePath}' -", $output);
        $text = implode("\n", $output);

        // Buscar sección de tabla de contenidos
        $tocPattern = '/(?:ÍNDICE|TABLA DE CONTENIDOS|CONTENIDO|TABLE OF CONTENTS).*?\n(.*?)(?:\n\n|\n[A-Z])/s';
        if (preg_match($tocPattern, $text, $matches)) {
            $tocText = $matches[1];

            // Extraer entradas de la tabla de contenidos
            $entries = [];
            $pattern = '/([0-9\.]*)\s*(.*?)\s*\.{2,}\s*([0-9]+)/';
            preg_match_all($pattern, $tocText, $matches, PREG_SET_ORDER);

            foreach ($matches as $match) {
                $entries[] = [
                    'number' => trim($match[1]),
                    'title' => trim($match[2]),
                    'page' => (int)$match[3]
                ];
            }

            return $entries;
        }

        // Si no se encuentra una tabla de contenidos, intentar extraer encabezados
        $entries = [];
        $headingPattern = '/\n([0-9\.]+)\s+([A-ZÁÉÍÓÚÑ].*?)\s*\n/';
        preg_match_all($headingPattern, $text, $matches, PREG_SET_ORDER);

        foreach ($matches as $index => $match) {
            // Intentar encontrar el número de página (esto es aproximado)
            $pageNumber = $index + 1; // Valor predeterminado si no se puede determinar

            $entries[] = [
                'number' => trim($match[1]),
                'title' => trim($match[2]),
                'page' => $pageNumber
            ];
        }

        return $entries;
    }

    /**
     * Extrae la tabla de contenidos de un archivo Word
     * 
     * @param string $filePath Ruta al archivo Word
     * @return array Tabla de contenidos en formato [título => página]
     */
    private function extractTableOfContentsFromWord($filePath)
    {
        // Primero convertimos el documento Word a texto plano
        $outputDir = storage_path('app/temp');
        if (!file_exists($outputDir)) {
            mkdir($outputDir, 0755, true);
        }

        $outputTextFile = $outputDir . '/' . basename($filePath) . '.txt';

        // Usar LibreOffice para convertir a texto
        $command = 'libreoffice --headless --convert-to txt --outdir ' .
            escapeshellarg($outputDir) . ' ' .
            escapeshellarg($filePath) . ' 2>&1';

        exec($command, $output, $returnVar);

        if ($returnVar !== 0 || !file_exists($outputTextFile)) {
            Log::error('Error al convertir Word a texto: ' . implode("\n", $output));

            // Intentar con antiword como alternativa (si está instalado)
            $command = 'antiword ' . escapeshellarg($filePath) . ' > ' . escapeshellarg($outputTextFile) . ' 2>&1';
            exec($command, $output, $returnVar);

            if ($returnVar !== 0 || !file_exists($outputTextFile)) {
                Log::error('Error al convertir Word a texto con antiword: ' . implode("\n", $output));
                return [];
            }
        }

        // Leer el contenido del archivo de texto
        $text = file_get_contents($outputTextFile);

        // Eliminar el archivo temporal
        @unlink($outputTextFile);

        // Buscar sección de tabla de contenidos (similar a PDF)
        $tocPattern = '/(?:ÍNDICE|TABLA DE CONTENIDOS|CONTENIDO|TABLE OF CONTENTS).*?\n(.*?)(?:\n\n|\n[A-Z])/s';
        if (preg_match($tocPattern, $text, $matches)) {
            $tocText = $matches[1];

            // Extraer entradas de la tabla de contenidos
            $entries = [];
            $pattern = '/([0-9\.]*)\s*(.*?)\s*\.{2,}\s*([0-9]+)/';
            preg_match_all($pattern, $tocText, $matches, PREG_SET_ORDER);

            foreach ($matches as $match) {
                $entries[] = [
                    'number' => trim($match[1]),
                    'title' => trim($match[2]),
                    'page' => (int)$match[3]
                ];
            }

            return $entries;
        }

        // Si no se encuentra una tabla de contenidos, intentar extraer encabezados
        $entries = [];
        $headingPattern = '/\n([0-9\.]+)\s+([A-ZÁÉÍÓÚÑ].*?)\s*\n/';
        preg_match_all($headingPattern, $text, $matches, PREG_SET_ORDER);

        foreach ($matches as $index => $match) {
            $entries[] = [
                'number' => trim($match[1]),
                'title' => trim($match[2]),
                'page' => $index + 1
            ];
        }

        return $entries;
    }

    // /**
    //  * Genera un enlace compartible para un documento
    //  * 
    //  * @param Document $document
    //  * @return \Illuminate\Http\JsonResponse
    //  */
    // public function share(Document $document)
    // {
    //     // URL para compartir el documento
    //     $shareUrl = route('documents.show', $document);

    //     // Información para compartir en redes sociales
    //     $shareData = [
    //         'url' => $shareUrl,
    //         'title' => $document->title,
    //         'description' => Str::limit($document->description, 100),
    //         'social_links' => [
    //             'facebook' => 'https://www.facebook.com/sharer/sharer.php?u=' . urlencode($shareUrl),
    //             'twitter' => 'https://twitter.com/intent/tweet?url=' . urlencode($shareUrl) . '&text=' . urlencode($document->title),
    //             'linkedin' => 'https://www.linkedin.com/sharing/share-offsite/?url=' . urlencode($shareUrl),
    //             'whatsapp' => 'https://wa.me/?text=' . urlencode($document->title . ' - ' . $shareUrl),
    //             'email' => 'mailto:?subject=' . urlencode($document->title) . '&body=' . urlencode('Mira este documento: ' . $shareUrl)
    //         ]
    //     ];

    //     if (request()->expectsJson()) {
    //         return response()->json($shareData);
    //     }

    //     return view('documents.share', compact('document', 'shareData'));
    // }

    public function areasGrado(Request $request)
    {
        $query = Document::where('document_type', 'area_grado');

        // Search functionality
        if ($request->has('search') && !empty($request->search)) {
            $searchTerm = $request->search;
            $query->where(function ($q) use ($searchTerm) {
                $q->where('title', 'like', '%' . $searchTerm . '%')
                    ->orWhere('description', 'like', '%' . $searchTerm . '%')
                    ->orWhere('author', 'like', '%' . $searchTerm . '%');
                // Eliminamos la búsqueda en 'abstract' ya que no existe esa columna
            });
        }

        // Filter by category if provided
        if ($request->has('category') && !empty($request->category)) {
            $query->whereIn('category', $request->category);
        }

        // Filter by year if provided
        if ($request->has('year') && !empty($request->year)) {
            $query->whereYear('created_at', $request->year);
        }

        // Get unique categories and years for filters
        $categories = Document::where('document_type', 'area_grado')
            ->whereNotNull('category')
            ->distinct()
            ->pluck('category')
            ->toArray();

        $years = Document::where('document_type', 'area_grado')
            ->selectRaw('YEAR(created_at) as year')
            ->distinct()
            ->orderBy('year', 'desc')
            ->pluck('year')
            ->toArray();

        $documents = $query->with('user')
            ->latest()
            ->paginate(10)
            ->withQueryString(); // This preserves the query parameters in pagination links

        return view('areasGrado', compact('documents', 'categories', 'years'));
    }

    public function tesis(Request $request)
    {
        // Obtener documentos de tipo tesis
        $query = Document::where('document_type', 'tesis');

        // Aplicar búsqueda si existe
        if ($request->has('search') && !empty($request->search)) {
            $searchTerm = $request->search;
            $query->where(function ($q) use ($searchTerm) {
                $q->where('title', 'LIKE', "%{$searchTerm}%")
                    ->orWhere('description', 'LIKE', "%{$searchTerm}%")
                    ->orWhere('author', 'LIKE', "%{$searchTerm}%");
            });
        }

        // Aplicar filtros de categoría
        if ($request->has('category')) {
            $query->whereIn('category', $request->category);
        }

        // Aplicar filtros de año
        if ($request->has('year')) {
            $query->whereIn(DB::raw('YEAR(created_at)'), $request->year);
        }

        // Obtener documentos paginados
        $documents = $query->paginate(10)->withQueryString();

        // Obtener categorías únicas para los filtros
        $categories = Document::where('document_type', 'tesis')
            ->distinct()
            ->pluck('category')
            ->filter()
            ->values()
            ->toArray();

        // Obtener años únicos para los filtros
        $years = Document::where('document_type', 'tesis')
            ->selectRaw('YEAR(created_at) as year')
            ->distinct()
            ->pluck('year')
            ->sort()
            ->values()
            ->toArray();

        return view('tesis', compact('documents', 'categories', 'years'));
    }

    public function pasantias(Request $request)
    {
        // Get search query if any
        $search = $request->input('search');

        // Start with a base query for pasantias documents
        $query = Document::where('document_type', 'pasantia');

        // Apply search if provided
        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                    ->orWhere('author', 'like', "%{$search}%")
                    // Removing the abstract column reference
                    ->orWhere('description', 'like', "%{$search}%");
            });
        }

        // Apply category filter if provided
        if ($request->has('category')) {
            $query->whereIn('category', $request->category);
        }

        // Apply year filter if provided
        if ($request->has('year')) {
            $query->whereIn(DB::raw('YEAR(created_at)'), $request->year);
        }

        // Get the documents with pagination
        $documents = $query->orderBy('created_at', 'desc')->paginate(10);

        // Get all unique categories for the filter
        $categories = Document::where('document_type', 'pasantia')
            ->distinct()
            ->pluck('category')
            ->filter()
            ->values()
            ->toArray();

        // Get all unique years for the filter
        $years = Document::where('document_type', 'pasantia')
            ->selectRaw('YEAR(created_at) as year')
            ->distinct()
            ->pluck('year')
            ->sort()
            ->reverse()
            ->values()
            ->toArray();

        return view('pasantias', compact('documents', 'categories', 'years'));
    }

    public function practicasProfesionales(Request $request)
    {
        // Base query for professional practices documents
        $query = Document::where('document_type', 'practicas_profesionales');

        // Apply search filter if provided
        if ($request->has('search') && !empty($request->search)) {
            $searchTerm = $request->search;
            $query->where(function ($q) use ($searchTerm) {
                $q->where('title', 'like', "%{$searchTerm}%")
                    ->orWhere('description', 'like', "%{$searchTerm}%")
                    ->orWhere('author', 'like', "%{$searchTerm}%")
                    ->orWhere('keywords', 'like', "%{$searchTerm}%");
            });
        }

        // Apply category filter if provided
        if ($request->has('category') && !empty($request->category)) {
            $query->whereIn('category', $request->category);
        }

        if ($request->has('year') && !empty($request->year)) {
            $query->whereIn(DB::raw('YEAR(created_at)'), $request->year);
        }

        // Get the documents with pagination
        $documents = $query->latest()->paginate(10)->withQueryString();

        // Get unique categories for filter
        $categories = Document::where('document_type', 'practicas_profesionales')
            ->distinct()
            ->pluck('category')
            ->filter()
            ->values()
            ->toArray();

        // Get unique years for filter - using created_at to match the filter logic above
        $years = Document::where('document_type', 'practicas_profesionales')
            ->selectRaw('YEAR(created_at) as year')
            ->distinct()
            ->pluck('year')
            ->sort()
            ->reverse()
            ->values()
            ->toArray();

        return view('practicasProfesionales', compact('documents', 'categories', 'years'));
    }

    public function serviciosComunitarios(Request $request)
    {
        $query = Document::where('document_type', 'servicio_comunitario');

        // Búsqueda
        if ($request->has('search') && !empty($request->search)) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                    ->orWhere('description', 'like', "%{$search}%")
                    ->orWhere('author', 'like', "%{$search}%");
            });
        }

        // Aplicar filtros si existen
        if ($request->has('category')) {
            $query->whereIn('category', $request->category);
        }

        if ($request->has('year')) {
            $query->whereYear('created_at', $request->year);
        }

        // Obtener documentos ordenados por fecha de creación
        $documents = $query->orderBy('created_at', 'desc')->paginate(6)->withQueryString();

        // Obtener datos para los filtros
        $categories = Document::where('document_type', 'servicio_comunitario')
            ->distinct()
            ->pluck('category')
            ->filter();

        $years = Document::where('document_type', 'servicio_comunitario')
            ->selectRaw('YEAR(created_at) as year')
            ->distinct()
            ->pluck('year')
            ->sort()
            ->reverse();

        return view('serviciosComunitarios', compact('documents', 'categories', 'years'));
    }

    public function lineasInvestigacion(Request $request)
    {
        $query = Document::where('document_type', 'lineas_investigacion');

        // Búsqueda
        if ($request->has('search') && !empty($request->search)) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                    ->orWhere('description', 'like', "%{$search}%")
                    ->orWhere('author', 'like', "%{$search}%");
            });
        }

        // Aplicar filtros si existen
        if ($request->has('category')) {
            $query->whereIn('category', $request->category);
        }

        if ($request->has('year')) {
            $query->whereYear('created_at', $request->year);
        }

        // Obtener documentos ordenados por fecha de creación
        $documents = $query->orderBy('created_at', 'desc')->paginate(6)->withQueryString();

        // Obtener datos para los filtros
        $categories = Document::where('document_type', 'lineas_investigacion')
            ->distinct()
            ->pluck('category')
            ->filter();

        $years = Document::where('document_type', 'lineas_investigacion')
            ->selectRaw('YEAR(created_at) as year')
            ->distinct()
            ->pluck('year')
            ->sort()
            ->reverse();

        return view('lineasInvestigacion', compact('documents', 'categories', 'years'));
    }

    /**
     * Almacena un nuevo comentario para un documento
     *
     * @param Request $request
     * @param Document $document
     * @return \Illuminate\Http\RedirectResponse
     */
    public function storeComment(Request $request, Document $document)
    {
        $request->validate([
            'content' => 'required|string|max:1000',
        ]);

        $comment = new Comment([
            'content' => $request->content,
            'user_id' => Auth::id(),
            'document_id' => $document->id,
        ]);

        $comment->save();

        return redirect()->back()->with('success', 'Comentario agregado correctamente');
    }

    /**
     * Elimina un comentario
     *
     * @param \App\Models\Comment $comment
     * @return \Illuminate\Http\RedirectResponse
     */
    public function deleteComment(Comment $comment)
    {
        // Verificar si el usuario está autorizado para eliminar este comentario
        if (Auth::id() !== $comment->user_id && Auth::id() !== $comment->document->user_id) {
            abort(403, 'No tienes permiso para eliminar este comentario');
        }

        $comment->delete();
        return redirect()->back()->with('success', 'Comentario eliminado correctamente');
    }
}
