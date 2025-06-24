<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTerrainImageRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'terrain_id' => 'sometimes|exists:terrains,id',
            'image_path' => 'sometimes|string|max:255',
        ];
    }
}
