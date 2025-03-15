<?php

namespace App\Policies;

use App\Models\Document;
use App\Models\User;

class DocumentPolicy
{
    public function viewAny(User $user): bool
    {
        return true;
    }

    public function view(?User $user, Document $document): bool
    {
        return true; // Todos pueden ver documentos
    }

    public function create(User $user): bool
    {
        return $user->hasPermission('create-documents') || $user->hasRole('admin');
    }

    public function update(User $user, Document $document): bool
    {
        return $user->id === $document->user_id || 
               $user->hasPermission('edit-any-document') || 
               $user->hasRole('admin');
    }

    public function delete(User $user, Document $document): bool
    {
        return $user->id === $document->user_id || 
               $user->hasPermission('delete-any-document') || 
               $user->hasRole('admin');
    }
}