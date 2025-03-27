<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePlantRequest;
use App\Http\Requests\UpdatePlantRequest;
use App\Repositories\PlantRepositoryInterface;

class PlantController extends Controller
{
    protected $plantRepository;

    public function __construct(PlantRepositoryInterface $plantRepository)
    {
        $this->plantRepository = $plantRepository;
    }


    public function index()
    {
        try {
            $plants = $this->plantRepository->all();
            return response()->json($plants, 200);

        } catch (\Throwable $th) {
            return response()->json([
                "status" => false,
                "message" => $th->getMessage(),
            ], 500);
        }
    }

    public function show($slug)
    {
        try {
            $plant = $this->plantRepository->findBySlug($slug);
            return response()->json($plant, 200);
        } catch (\Throwable $th) {
            return response()->json([
                "status" => false,
                "message" => $th->getMessage(),
            ], 500);
        }
    }


    public function store(StorePlantRequest $request)
    {
        try {
            $plant = $this->plantRepository->create($request->all());
            return response()->json($plant, 201);
        } catch (\Throwable $th) {
            return response()->json([
                "status" => false,
                "message" => $th->getMessage(),
            ], 500);
        }
    }


    public function update($slug, UpdatePlantRequest $request)
    {
        try {
            $plant = $this->plantRepository->update($slug, $request->all());
            return response()->json($plant, 200);
        } catch (\Throwable $th) {
            return response()->json([
                "status" => false,
                "message" => $th->getMessage(),
            ], 500);
        }
    }

    public function destroy($slug)
    {
        try {
            $this->plantRepository->delete($slug);
            return response()->json([
                "status" => true,
                "message" => "Plant deleted successfully."
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                "status" => false,
                "message" => $th->getMessage(),
            ], 500);
        }
    }
}
