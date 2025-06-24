<?php

namespace App\Policies;

use App\Models\TerrainImage;
use App\Models\User;

class TerrainImagePolicy
{
    public function viewAny(User $user)
    {
        return true;
    }

    public function view(User $user, TerrainImage $terrainImage)
    {
        return true;
    }

    public function create(User $user)
    {
        return true;
    }

    public function update(User $user, TerrainImage $terrainImage)
    {
        // Allow update only if the user owns the terrain
        return $user->id === $terrainImage->terrain->owner_id;
    }

    public function delete(User $user, TerrainImage $terrainImage)
    {
        return $user->id === $terrainImage->terrain->owner_id;
    }
}
