<?php

namespace App\Policies;

use App\Models\Matter;
use App\Models\User;

class MatterPolicy
{
    public function viewAny(User $user): bool
    {
        return $user->hasAnyRole(['admin','attorney','staff']);
    }

    public function view(User $user, Matter $matter): bool
    {
        return $user->hasRole('admin') || $matter->users->contains($user->id);
    }

    public function create(User $user): bool
    {
        return $user->hasAnyRole(['admin','attorney']);
    }

    public function update(User $user, Matter $matter): bool
    {
        return $user->hasRole('admin') || $matter->users->contains($user->id);
    }

    public function delete(User $user, Matter $matter): bool
    {
        return $user->hasRole('admin');
    }
}