<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Fine;
use Illuminate\Http\Request;

class FineController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): \Illuminate\Database\Eloquent\Collection
    {
        return Fine::all();
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
            'plate_number' => 'nullable|string|max:20',
            'amount' => 'required|numeric|min:0',
            'type' => 'required|in:red_line,speed',
            'car_id' => 'required|exists:cars,id',
        ]);

        $fine = Fine::create($validatedData);

        return response()->json([
            'message' => 'Fine created successfully',
            'fine' => $fine
        ]);
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id): \Illuminate\Http\JsonResponse
    {
        $license = Fine::query()->findOrFail($id);
        return response()->json([$license]);
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
            'plate_number' => 'nullable|string|max:20',
            'amount' => 'nullable|numeric|min:0',
            'type' => 'nullable|in:red_line,speed',
            'car_id' => 'required|exists:cars,id',
        ]);

        $fine = Fine::findOrFail($id);
        $fine->update($validatedData);

        return response()->json([
            'message' => 'Fine updated successfully',
            'fine' => $fine
        ]);
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): \Illuminate\Http\JsonResponse
    {
        $fine = Fine::query()->findOrFail($id);
        $fine->delete();
        return response()->json(['message' => 'Fine deleted successfully']);
    }
}
