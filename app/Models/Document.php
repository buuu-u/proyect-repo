<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Document extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'author',
        'file_path',
        'file_type',
        'file_size',
        'document_type',
        'views_count',
        'downloads_count',
        'collection_id',
        'user_id',
        // Fields for Areas de Grado
        'category',
        'keywords',
        'status',
        // Fields for Tesis
        'level',
        'faculty',
        // Fields for Pasantias
        'sector',
        'duration',
        'company',
        'career',
        // Fields for Practicas Profesionales
        'area',
        // Fields for Servicios Comunitarios
        'community_type',
        'impact_area',
        'location',
        // Fields for Lineas de Investigacion
        'research_area',
        // Nuevos campos de metadatos
        'director',
        'co_director',
        'academic_degree',
        'institution',
        'department',
        'publication_date',
        'defense_date',
        'language',
        'page_count',
        'identifier',
        'rights'
    ];

    // public function collection(): BelongsTo
    // {
    //     return $this->belongsTo(Collection::class);
    // }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function incrementViewCount(): void
    {
        $this->increment('views_count');
    }

    public function incrementDownloadCount(): void
    {
        $this->increment('downloads_count');
    }

    public function getFormattedSizeAttribute(): string
    {
        $bytes = $this->file_size;
        $units = ['B', 'KB', 'MB', 'GB', 'TB'];

        for ($i = 0; $bytes > 1024; $i++) {
            $bytes /= 1024;
        }

        return round($bytes, 2) . ' ' . $units[$i];
    }

    public function comments()
    {
        return $this->hasMany(\App\Models\Comment::class)->orderBy('created_at', 'desc');
    }
}
