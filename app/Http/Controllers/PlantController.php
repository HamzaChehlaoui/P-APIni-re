<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Plant;

use Illuminate\Http\Request;

class PlantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Plant::with('category')->get());
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $plant = Plant::create($request->all());
        return response()->json($plant, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Plant $plant)
    {
        return response()->json($plant->load('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Plant $plant)
    {
        $plant->update($request->all());
        return response()->json($plant);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Plant $plant)
    {
        $plant->delete();
        return response()->json(null, 204);
    }
}
