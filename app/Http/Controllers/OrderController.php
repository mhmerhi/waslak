<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Driver;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function unpaid()
    {
        $orders = Order::query()->where('driver_paid', '=', 0)->orderBy('created_at', 'desc')->get();

        return view('orders.unpaid', compact('orders'));
    }

    public function index()
    {
        $orders = Order::query()->orderBy('created_at', 'desc')->get();

        return view('orders.index', compact('orders'));
    }

    public function create()
    {
        $clients = Client::all();
        $drivers = Driver::all();

        return view('orders.create', compact('clients', 'drivers'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'client_id' => 'required|exists:clients,id',
            'driver_id' => 'required|exists:drivers,id',
            'type' => 'required|string|max:255',
            'from' => 'required|string|max:255',
            'to' => 'required|string|max:255',
            'cost' => 'required|numeric',
            'profit' => 'nullable|numeric',
        ]);

        Order::create([
            'user_id' => Auth::user()->id,
            'client_id' => $validatedData['client_id'],
            'driver_id' => $validatedData['driver_id'],
            'type' => $validatedData['type'],
            'from' => $validatedData['from'],
            'to' => $validatedData['to'],
            'cost' => $validatedData['cost'],
            'profit' => $validatedData['profit'] ?? ($validatedData['cost'] / 5),
            'client_paid' => $request->has('client_paid'),
            'driver_paid' => $request->has('driver_paid'),
            'driver_paid_by_account' => $request->has('driver_paid_by_account'),
        ]);

        return redirect()->route('orders.index')->with('success', 'Order added successfully!');
    }

    public function edit(int $id)
    {
        $order = Order::findOrFail($id);
        $clients = Client::all();
        $drivers = Driver::all();

        return view('orders.edit', compact('order', 'clients', 'drivers'));
    }

    public function show(int $id)
    {
        $order = Order::find($id);

        return view('orders.show', compact('order'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'client_id' => 'required|exists:clients,id',
            'driver_id' => 'required|exists:drivers,id',
            'type' => 'required|string|max:255',
            'from' => 'required|string|max:255',
            'to' => 'required|string|max:255',
            'cost' => 'required|numeric',
            'profit' => 'nullable|numeric',
        ]);

        $order = Order::findOrFail($id);

        $order->update([
            'client_id' => $validatedData['client_id'],
            'driver_id' => $validatedData['driver_id'],
            'type' => $validatedData['type'],
            'from' => $validatedData['from'],
            'to' => $validatedData['to'],
            'cost' => $validatedData['cost'],
            'profit' => $validatedData['profit'] ?? ($validatedData['cost'] / 5),
        ]);

        return redirect()->route('orders.index')->with('success', 'Order updated successfully!');
    }
}
