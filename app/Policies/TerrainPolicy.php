<?php

namespace App\Policies;

use App\Models\Terrain;
use App\Models\User;

class TerrainPolicy
{
    public function viewAny(User $user)
    {
        return true;
    }

    public function view(User $user, Terrain $terrain)
    {
        return true;
    }

    public function create(User $user)
    {
        return true;
    }

    public function update(User $user, Terrain $terrain)
    {
        return $user->id === $terrain->owner_id;
    }

    public function delete(User $user, Terrain $terrain)
    {
        return $user->id === $terrain->owner_id;
    }
}
