<?php

namespace App\Http\Controllers;

use App\Models\TerrainImage;
use App\Http\Requests\StoreTerrainImageRequest;
use App\Http\Requests\UpdateTerrainImageRequest;

class TerrainImageController extends Controller
{
    public function index()
    {
        return response()->json(TerrainImage::paginate(10));
    }

    public function store(StoreTerrainImageRequest $request)
    {
        $image = TerrainImage::create($request->validated());
        return response()->json($image, 201);
    }

    public function show(TerrainImage $terrainImage)
    {
        return response()->json($terrainImage);
    }

    public function update(UpdateTerrainImageRequest $request, TerrainImage $terrainImage)
    {
        $terrainImage->update($request->validated());
        return response()->json($terrainImage);
    }

    public function destroy(TerrainImage $terrainImage)
    {
        $terrainImage->delete();
        return response()->json(null, 204);
    }
}
