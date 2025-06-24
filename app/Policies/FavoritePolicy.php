<?php

namespace App\Policies;

use App\Models\Favorite;
use App\Models\User;

class FavoritePolicy
{
    public function viewAny(User $user)
    {
        return true;
    }

    public function view(User $user, Favorite $favorite)
    {
        return true;
    }

    public function create(User $user)
    {
        return true;
    }

    public function update(User $user, Favorite $favorite)
    {
        return $user->id === $favorite->user_id;
    }

    public function delete(User $user, Favorite $favorite)
    {
        return $user->id === $favorite->user_id;
    }
}
