<?php

namespace App\Policies;

use App\Models\Booking;
use App\Models\User;

class BookingPolicy
{
    public function viewAny(User $user)
    {
        return true;
    }

    public function view(User $user, Booking $booking)
    {
        return $user->id === $booking->renter_id || $user->id === $booking->terrain->owner_id;
    }

    public function create(User $user)
    {
        return true;
    }

    public function update(User $user, Booking $booking)
    {
        return $user->id === $booking->renter_id;
    }

    public function delete(User $user, Booking $booking)
    {
        return $user->id === $booking->renter_id;
    }
}
