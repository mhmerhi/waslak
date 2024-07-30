<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::all();

        return view('clients.index', compact('clients'));
    }

    public function create()
    {
        return view('clients.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
        ]);

        Client::create([
            'name' => $request->get('name'),
            'phone' => $request->get('phone'),
            'has_account' => $request->filled('has_account'),
            'address' => $request->get('address'),
            'description' => $request->get('description'),
        ]);

        return redirect()->route('clients.index')->with('success', 'Client added successfully!');
    }

    public function edit(int $id)
    {
        $client = Client::find($id);

        return view('clients.edit', compact('client'));
    }

    public function show(int $id)
    {
        $client = Client::find($id);

        return view('clients.show', compact('client'));
    }

    public function update(Request $request, $id)
    {
        $client = Client::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:255|unique:clients,phone,' . $id,
        ]);

        $client->update([
            'name' => $request->get('name'),
            'phone' => $request->get('phone'),
            'has_account' => $request->filled('has_account'),
            'activated' => $request->filled('activated'),
            'address' => $request->get('address'),
            'description' => $request->get('description'),
        ]);

        return redirect()->route('clients.index')->with('success', 'Client updated successfully!');
    }
}
