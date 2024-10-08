<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use Illuminate\Http\Request;

class DriverController extends Controller
{
    public function index()
    {
        $drivers = Driver::all();

        return view('drivers.index', compact('drivers'));
    }

    public function create()
    {
        return view('drivers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'type' => 'required|string|max:255',
        ]);

        Driver::create([
            'name' => $request->get('name'),
            'phone' => $request->get('phone'),
            'address' => $request->get('address'),
            'type' => $request->get('type'),
            'recorded' => $request->filled('recorded'),
            'has_account' => $request->filled('has_account'),
            'activated' => $request->filled('activated'),
        ]);

        return redirect()->route('drivers.index')->with('success', 'Driver added successfully!');
    }

    public function show(int $id)
    {
        $driver = Driver::find($id);

        return view('drivers.show', compact('driver'));
    }

    public function edit(int $id)
    {
        $driver = Driver::find($id);

        return view('drivers.edit', compact('driver'));
    }

    public function update(Request $request, $id)
    {
        $driver = Driver::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:255|unique:drivers,phone,' . $id,
            'type' => 'required|string|max:255',
        ]);

        $driver->update([
            'name' => $request->get('name'),
            'phone' => $request->get('phone'),
            'address' => $request->get('address'),
            'type' => $request->get('type'),
            'recorded' => $request->filled('recorded'),
            'has_account' => $request->filled('has_account'),
            'activated' => $request->filled('activated'),
        ]);

        return redirect()->route('drivers.index')->with('success', 'Driver updated successfully!');
    }
}
