<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Driver;
use App\Models\MonthlyRide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MonthlyRideController extends Controller
{
    public function unpaid()
    {
        $monthlyRides = MonthlyRide::query()->where('client_paid', '=', 0)->orderBy('created_at', 'desc')->get();

        return view('monthly_rides.unpaid', compact('monthlyRides'));
    }

    public function index()
    {
        $monthlyRides = MonthlyRide::query()->orderBy('created_at', 'desc')->get();

        return view('monthly_rides.index', compact('monthlyRides'));
    }

    public function create()
    {
        $clients = Client::all();
        $drivers = Driver::all();

        return view('monthly_rides.create', compact('clients', 'drivers'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'client_id' => 'required|exists:clients,id',
            'driver_id' => 'required|exists:drivers,id',
            'type' => 'required|string|max:255',
            'from' => 'nullable|string|max:255',
            'to' => 'nullable|string|max:255',
            'cost' => 'required|numeric',
        ]);

        MonthlyRide::create([
            'user_id' => Auth::user()->id,
            'client_id' => $validatedData['client_id'],
            'driver_id' => $validatedData['driver_id'],
            'type' => $validatedData['type'],
            'from' => $validatedData['from'],
            'to' => $validatedData['to'],
            'cost' => $validatedData['cost'],
            'client_paid' => $request->has('client_paid'),
        ]);

        return redirect()->route('monthly-rides.index')->with('success', 'Monthly Ride added successfully!');
    }

    public function edit(int $id)
    {
        $monthlyRide = MonthlyRide::findOrFail($id);
        $clients = Client::all();
        $drivers = Driver::all();

        return view('monthly_rides.edit', compact('monthlyRide', 'clients', 'drivers'));
    }

    public function show(int $id)
    {
        $monthlyRide = MonthlyRide::find($id);

        return view('monthly_rides.show', compact('monthlyRide'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'client_id' => 'required|exists:clients,id',
            'driver_id' => 'required|exists:drivers,id',
            'type' => 'required|string|max:255',
            'from' => 'nullable|string|max:255',
            'to' => 'nullable|string|max:255',
            'cost' => 'required|numeric',
        ]);

        $monthlyRide = MonthlyRide::findOrFail($id);

        $monthlyRide->update([
            'client_id' => $validatedData['client_id'],
            'driver_id' => $validatedData['driver_id'],
            'type' => $validatedData['type'],
            'from' => $validatedData['from'],
            'to' => $validatedData['to'],
            'cost' => $validatedData['cost'],
        ]);

        return redirect()->route('monthly-rides.index')->with('success', 'Monthly Ride updated successfully!');
    }

    public function approve(int $id)
    {
        $monthlyRide = MonthlyRide::find($id);

        $monthlyRide->client_paid = true;

        $monthlyRide->save();

        return redirect()->route('monthly-rides.unpaid')->with('success', 'Monthly Ride Approved successfully!');
    }
}
