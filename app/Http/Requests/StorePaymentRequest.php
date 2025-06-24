<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePaymentRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'booking_id' => 'required|exists:bookings,id',
            'payment_method' => 'required|string|max:255',
            'amount_paid' => 'required|numeric|min:0',
            'payment_date' => 'date',
            'status' => 'in:paid,failed,refunded',
            'transaction_id' => 'nullable|string|max:255',
        ];
    }
}
