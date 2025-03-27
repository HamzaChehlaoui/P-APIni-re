<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Repositories\OrderRepositoryInterface;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class OrderController extends Controller
{
    protected $orderRepository;

    public function __construct(OrderRepositoryInterface $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }


    public function index()
    {
        try {
            $orders = $this->orderRepository->all(Auth::user());
            return response()->json($orders, 200);
        } catch (\Throwable $th) {
            return response()->json([
                "status" => false,
                "message" => $th->getMessage(),
            ], 500);
        }
    }

    public function show(int $id)
    {
        try {
            $order = $this->orderRepository->find($id);

            if (!$order) {
                return response()->json([
                    "status" => false,
                    "message" => "Order not found",
                ], 404);
            }

            // check if the user is allowed to view the order
            Gate::authorize('view', $order);

            return response()->json($order, 200);
        } catch (AuthorizationException $e) {
            return response()->json([
                "status" => false,
                "message" => $e->getMessage(),
            ], 403);
        } catch (\Throwable $th) {
            return response()->json([
                "status" => false,
                "message" => $th->getMessage(),
            ], 500);
        }
    }


    public function update(int $id, UpdateOrderRequest $request)
    {
        try {
            $data = [
                'status' => $request->status,
                'user' => Auth::user(),
            ];

            $order = $this->orderRepository->update($id, $data);

            if (!$order) {
                return response()->json([
                    "status" => false,
                    "message" => "Order not found",
                ], 404);
            }

            if ($order === false) {
                return response()->json([
                    "status" => false,
                    "message" => "You are not allowed to update this order",
                ], 403);
            }

            return response()->json($order, 200);
        } catch (\Throwable $th) {
            return response()->json([
                "status" => false,
                "message" => $th->getMessage(),
            ], 500);
        }
    }

   
    public function store(StoreOrderRequest $request)
    {
        try {
            $data = [
                'user_id' => Auth::id(),
                'plants_ids' => $request->plants_ids,
            ];

            $order = $this->orderRepository->create($data);

            return response()->json($order, 201);
        } catch (\Throwable $th) {
            return response()->json([
                "status" => false,
                "message" => $th->getMessage(),
            ], 500);
        }
    }
}
