<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTerrainImageRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'terrain_id' => 'required|exists:terrains,id',
            'image_path' => 'required|string|max:255',
        ];
    }
}
