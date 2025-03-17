<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'content',
        'user_id',
        'document_id',
    ];

    /**
     * Obtiene el usuario que creó el comentario
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Obtiene el documento al que pertenece el comentario
     */
    public function document()
    {
        return $this->belongsTo(Document::class);
    }

    /**
     * Verifica si el comentario es del autor del documento
     */
    public function isFromAuthor()
    {
        return $this->user_id === $this->document->user_id;
    }
}