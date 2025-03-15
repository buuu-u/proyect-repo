<?php

namespace App\Policies;

use App\Models\Collection;
use App\Models\User;

class CollectionPolicy
{
    public function viewAny(User $user): bool
    {
        return true;
    }

    public function view(?User $user, Collection $collection): bool
    {
        return true; // Todos pueden ver colecciones
    }

    public function create(User $user): bool
    {
        return $user->hasPermission('create-collections') || $user->hasRole('admin');
    }

    public function update(User $user, Collection $collection): bool
    {
        return $user->id === $collection->user_id || 
               $user->hasPermission('edit-any-collection') || 
               $user->hasRole('admin');
    }

    public function delete(User $user, Collection $collection): bool
    {
        return $user->id === $collection->user_id || 
               $user->hasPermission('delete-any-collection') || 
               $user->hasRole('admin');
    }
}