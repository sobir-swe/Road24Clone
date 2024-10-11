<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\License;
use Illuminate\Http\Request;

class LicenseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): \Illuminate\Database\Eloquent\Collection
    {
        return License::all();
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
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'date_of_birth' => 'required|date',
            'passport' => 'required|string|max:20',
            'phone_number' => 'required|string|max:15',
            'chat_id' => 'required|integer',
        ]);

        $license = License::query()->create($validatedData);

        $token = $license->createToken('LicenseToken')->plainTextToken;

        return response()->json([
            'message' => 'License created successfully',
            'license' => $license,
            'token' => $token
        ]);
    }



    /**
     * Display the specified resource.
     */
    public function show(string $id): \Illuminate\Http\JsonResponse
    {
        $license = License::query()->findOrFail($id);
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
            'first_name' => 'sometimes|required|string|max:255',
            'last_name' => 'sometimes|required|string|max:255',
            'date_of_birth' => 'sometimes|required|date',
            'passport' => 'sometimes|required|string|max:20',
            'phone_number' => 'sometimes|required|string|max:15',
            'chat_id' => 'sometimes|required|integer',
        ]);

        $license = License::findOrFail($id);
        $license->update($validatedData);

        return response()->json([
            'message' => 'License updated successfully',
            'license' => $license
        ]);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): \Illuminate\Http\JsonResponse
    {
        $category = License::query()->findOrFail($id);
        $category->delete();
        return response()->json(['message' => 'License deleted successfully']);
    }
}
