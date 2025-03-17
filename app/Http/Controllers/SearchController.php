<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Document;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    /**
     * Muestra la página de búsqueda avanzada y procesa los resultados
     */
    public function advanced(Request $request)
    {
        $query = Document::query();

        // Aplicar filtros de búsqueda
        if ($request->has('query') && !empty($request->input('query'))) {
            $searchTerm = $request->input('query');
            $query->where(function ($q) use ($searchTerm) {
                $q->where('title', 'LIKE', "%{$searchTerm}%")
                    ->orWhere('author', 'LIKE', "%{$searchTerm}%")
                    ->orWhere('description', 'LIKE', "%{$searchTerm}%")
                    ->orWhere('keywords', 'LIKE', "%{$searchTerm}%");
            });
        }

        // Filtrar por tipo de documento
        if ($request->has('type')) {
            $types = $request->input('type');
            if (!is_array($types)) {
                $types = [$types];
            }
            $query->whereIn('document_type', $types);
        }

        // Filtrar por año de publicación
        if ($request->has('year_from') && !empty($request->input('year_from'))) {
            $query->whereYear('publication_date', '>=', $request->input('year_from'));
        }

        if ($request->has('year_to') && !empty($request->input('year_to'))) {
            $query->whereYear('publication_date', '<=', $request->input('year_to'));
        }

        // Filtrar por palabras clave
        if ($request->has('keywords')) {
            $keywords = $request->input('keywords');
            if (!is_array($keywords)) {
                $keywords = [$keywords];
            }

            $query->where(function ($q) use ($keywords) {
                foreach ($keywords as $keyword) {
                    $q->orWhere('keywords', 'LIKE', "%{$keyword}%");
                }
            });
        }

        // Ordenar resultados
        if ($request->has('sort')) {
            switch ($request->input('sort')) {
                case 'date_asc':
                    $query->orderBy('publication_date', 'asc');
                    break;
                case 'date_desc':
                    $query->orderBy('publication_date', 'desc');
                    break;
                case 'title_asc':
                    $query->orderBy('title', 'asc');
                    break;
                case 'author_asc':
                    $query->orderBy('author', 'asc');
                    break;
                default:
                    $query->orderBy('publication_date', 'desc');
            }
        } else {
            $query->orderBy('publication_date', 'desc');
        }

        // Obtener resultados paginados
        $documents = $query->paginate(10)->appends($request->except('page'));
        $resultsCount = $documents->total();

        // Obtener tipos de documentos para filtros
        $documentTypes = DB::table('documents')
            ->select('document_type', DB::raw('count(*) as count'))
            ->groupBy('document_type')
            ->get();

        // Obtener años para filtros
        $years = DB::table('documents')
            ->selectRaw('YEAR(publication_date) as year')
            ->distinct()
            ->orderBy('year', 'desc')
            ->pluck('year')
            ->toArray();

        // Obtener palabras clave para filtros
        $keywordsData = [];
        $keywordsRaw = DB::table('documents')
            ->whereNotNull('keywords')
            ->pluck('keywords')
            ->toArray();

        $keywordCounts = [];
        foreach ($keywordsRaw as $keywordString) {
            $keywordList = explode(',', $keywordString);
            foreach ($keywordList as $keyword) {
                $keyword = trim($keyword);
                if (!empty($keyword)) {
                    if (isset($keywordCounts[$keyword])) {
                        $keywordCounts[$keyword]++;
                    } else {
                        $keywordCounts[$keyword] = 1;
                    }
                }
            }
        }

        // Convertir a formato de array con 'keyword' y 'count'
        foreach ($keywordCounts as $keyword => $count) {
            $keywordsData[] = [
                'keyword' => $keyword,
                'count' => $count
            ];
        }

        // Ordenar por frecuencia (count) descendente
        usort($keywordsData, function ($a, $b) {
            return $b['count'] - $a['count'];
        });

        // Cargar el conteo de comentarios, vistas y descargas
        $documents = $query->withCount(['comments'])->paginate(10)->appends($request->except('page'));
        $resultsCount = $documents->total();

        return view('busqueda-avanzada', compact('documents', 'resultsCount', 'documentTypes', 'years', 'keywordsData'));
    }

    /**
     * Procesa los resultados de búsqueda y redirecciona
     */
    public function results(Request $request)
    {
        // Redirigir a búsqueda avanzada con los mismos parámetros
        return redirect()->route('search.advanced', $request->all());
    }

    /**
     * Muestra los resultados de búsqueda simple
     */
    public function simple(Request $request)
    {
        $query = $request->input('query');

        if (empty($query)) {
            return redirect()->route('home');
        }

        $documents = Document::where('title', 'LIKE', "%{$query}%")
            ->orWhere('author', 'LIKE', "%{$query}%")
            ->orWhere('description', 'LIKE', "%{$query}%")
            ->orWhere('keywords', 'LIKE', "%{$query}%")
            ->orderBy('publication_date', 'desc')
            ->paginate(10);

        return view('resultados-busqueda', [
            'documents' => $documents,
            'query' => $query,
            'resultsCount' => $documents->total()
        ]);
    }

    /**
     * Realiza la búsqueda basada en los parámetros de la solicitud
     */
    private function performSearch(Request $request)
    {
        $query = Document::query();

        // Búsqueda básica - Fix the InputBag error
        if ($request->has('query') && !empty($request->input('query'))) {
            $searchTerm = $request->input('query');

            $query->where(function ($q) use ($searchTerm) {
                $q->where('title', 'like', "%{$searchTerm}%")
                    ->orWhere('description', 'like', "%{$searchTerm}%")
                    ->orWhere('author', 'like', "%{$searchTerm}%")
                    ->orWhere('keywords', 'like', "%{$searchTerm}%");
            });
        }

        // Filtrar por tipo de documento
        if ($request->has('type') && !empty($request->input('type'))) {
            $query->whereIn('document_type', $request->input('type'));
        }

        // Filtrar por rango de años
        if ($request->has('year_from') && !empty($request->input('year_from'))) {
            $query->whereYear('publication_date', '>=', $request->input('year_from'));
        }

        if ($request->has('year_to') && !empty($request->input('year_to'))) {
            $query->whereYear('publication_date', '<=', $request->input('year_to'));
        }

        // Filtrar por palabras clave
        if ($request->has('keywords') && !empty($request->input('keywords'))) {
            $query->where(function ($q) use ($request) {
                foreach ($request->input('keywords') as $keyword) {
                    $q->orWhere('keywords', 'like', "%{$keyword}%");
                }
            });
        }

        // Ordenar resultados
        if ($request->has('sort')) {
            switch ($request->input('sort')) {
                case 'date_desc':
                    $query->orderBy('publication_date', 'desc');
                    break;
                case 'date_asc':
                    $query->orderBy('publication_date', 'asc');
                    break;
                case 'title_asc':
                    $query->orderBy('title', 'asc');
                    break;
                case 'author_asc':
                    $query->orderBy('author', 'asc');
                    break;
                default:
                    $query->orderBy('publication_date', 'desc');
                    break;
            }
        } else {
            // Ordenamiento predeterminado
            $query->orderBy('publication_date', 'desc');
        }

        // Paginar resultados
        return $query->paginate(10)->appends($request->except('page'));
    }
}
