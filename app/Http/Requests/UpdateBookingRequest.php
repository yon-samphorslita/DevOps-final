<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBookingRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'terrain_id' => 'sometimes|exists:terrains,id',
            'renter_id' => 'sometimes|exists:users,id',
            'start_date' => 'sometimes|date',
            'end_date' => 'sometimes|date|after_or_equal:start_date',
            'total_price' => 'sometimes|numeric|min:0',
            'status' => 'in:pending,approved,rejected,cancelled,completed',
        ];
    }
}
