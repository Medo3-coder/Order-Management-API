<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\IndexOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Http\Requests\OrderStatsRequest;

class OrderController extends Controller
{
    public function store(StoreOrderRequest $request)
    {
        $order = Order::create($request->validated());
        return response()->json(['message' => 'Order created successfully', 'order' => $order], 201);
    }

    public function index(IndexOrderRequest $request)
    {
        $status = $request->status;
        $query = Order::with('customer');
        if ($status) {
            $query->where('status', $status);
        }
        return response()->json($query->get());
    }

    public function update(UpdateOrderRequest $request, $id)
    {
        $order = Order::findOrFail($id);
        $order->update($request->validated());
        return response()->json(['message' => 'Order status updated', 'order' => $order]);
    }

    public function stats(OrderStatsRequest $request)
    {
        $stats = [
            'total_revenue' => Order::sum('price'),
            'orders_per_status' => Order::select('status')
                ->groupBy('status')
                ->selectRaw('status, count(*) as count')
                ->pluck('count', 'status'),
        ];
        return response()->json($stats);
    }
}
