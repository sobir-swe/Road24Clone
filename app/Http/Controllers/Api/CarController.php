<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): \Illuminate\Database\Eloquent\Collection
    {
        return Car::all();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): \Illuminate\Http\JsonResponse
    {
        $validatedData = $request->validate([
            'model' => 'nullable|string|max:255',
            'color' => 'nullable|string|max:50',
            'year' => 'nullable|integer|min:1900|max:' . date('Y'),
            'plate_number' => 'nullable|string|max:20',
            'owner_id' => 'required|exists:licenses,id',
        ]);

        $car = Car::query()->create($validatedData);

        return response()->json([
            'message' => 'Car created successfully',
            'car' => $car
        ]);
    }




    /**
     * Display the specified resource.
     */
    public function show(string $id): \Illuminate\Http\JsonResponse
    {
        $car = Car::query()->findOrFail($id);
        return response()->json([$car]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): \Illuminate\Http\JsonResponse
    {
        $validatedData = $request->validate([
            'model' => 'nullable|string|max:255',
            'color' => 'nullable|string|max:50',
            'year' => 'nullable|integer|min:1900|max:' . date('Y'),
            'plate_number' => 'nullable|string|max:20',
            'owner_id' => 'required|exists:licenses,id',
        ]);

        $car = Car::findOrFail($id);

        $car->update($validatedData);

        return response()->json([
            'message' => 'Car updated successfully',
            'car' => $car
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): \Illuminate\Http\JsonResponse
    {
        $category = Car::query()->findOrFail($id);
        $category->delete();
        return response()->json(['message' => 'Car deleted successfully']);
    }
}
