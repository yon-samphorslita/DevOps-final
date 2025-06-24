<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateReviewRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'terrain_id' => 'sometimes|exists:terrains,id',
            'user_id' => 'sometimes|exists:users,id',
            'rating' => 'sometimes|integer|between:1,5',
            'comment' => 'nullable|string',
        ];
    }
}
