<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePaymentRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'booking_id' => 'sometimes|exists:bookings,id',
            'payment_method' => 'sometimes|string|max:255',
            'amount_paid' => 'sometimes|numeric|min:0',
            'payment_date' => 'sometimes|date',
            'status' => 'in:paid,failed,refunded',
            'transaction_id' => 'nullable|string|max:255',
        ];
    }
}
