<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'booking_id', 'payment_method', 'amount_paid', 'payment_date', 'status', 'transaction_id',
    ];

    protected $dates = ['payment_date'];

    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }
}
