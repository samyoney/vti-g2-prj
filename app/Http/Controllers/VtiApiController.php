<?php

namespace App\Http\Controllers;

use App\Models\VtiModel;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class VtiApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        $data = VtiModel::all();
        return response()->json($data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): JsonResponse
    {
        $validatedData = $request->validate([
            'field1' => 'required|string',
            'field2' => 'required|integer',
        ]);

        $newRecord = VtiModel::create($validatedData);
        return response()->json($newRecord, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): JsonResponse
    {
        $record = VtiModel::find($id);

        if (!$record) {
            return response()->json(['message' => 'Record not found'], 404);
        }

        return response()->json($record);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): JsonResponse
    {
        $record = VtiModel::find($id);

        if (!$record) {
            return response()->json(['message' => 'Record not found'], 404);
        }

        $validatedData = $request->validate([
            'field1' => 'sometimes|string',
            'field2' => 'sometimes|integer',
        ]);

        $record->update($validatedData);
        return response()->json($record);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $record = VtiModel::find($id);

        if (!$record) {
            return response()->json(['message' => 'Record not found'], 404);
        }

        $record->delete();
        return response()->json(['message' => 'Record deleted successfully']);
    }
}
