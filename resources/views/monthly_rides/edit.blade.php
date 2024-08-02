@extends('layouts.dashboard')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Edit Order</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('monthly-rides.update', $monthlyRide->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="row mb-2">
                    <div class="form-group col-md-6">
                        <label for="client_id">Client</label>
                        <select id="client_id" name="client_id" class="form-control" required>
                            @foreach($clients as $client)
                                <option value="{{ $client->id }}" {{ old('client_id', $monthlyRide->client_id) == $client->id ? 'selected' : '' }}>{{ $client->name }}</option>
                            @endforeach
                        </select>
                        @error('client_id')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group col-md-6">
                        <label for="driver_id">Driver</label>
                        <select id="driver_id" name="driver_id" class="form-control" required>
                            @foreach($drivers as $driver)
                                <option value="{{ $driver->id }}" {{ old('driver_id', $monthlyRide->driver_id) == $driver->id ? 'selected' : '' }}>{{ $driver->name }}</option>
                            @endforeach
                        </select>
                        @error('driver_id')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row mb-2">
                    <div class="form-group col-md-6">
                        <label for="type">Type</label>
                        <input type="text" id="type" name="type" class="form-control" value="{{ old('type', $monthlyRide->type) }}" required>
                        @error('type')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row mb-2">
                    <div class="form-group col-md-6">
                        <label for="from">From</label>
                        <input type="text" id="from" name="from" class="form-control" value="{{ old('from', $monthlyRide->from) }}">
                        @error('from')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group col-md-6">
                        <label for="to">To</label>
                        <input type="text" id="to" name="to" class="form-control" value="{{ old('to', $monthlyRide->to) }}">
                        @error('to')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row mb-2">
                    <div class="form-group col-md-6">
                        <label for="cost">Cost</label>
                        <input type="number" id="cost" name="cost" class="form-control" value="{{ old('cost', $monthlyRide->cost) }}" required>
                        @error('cost')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <button type="submit" class="btn btn-primary mt-3">Update Order</button>
            </form>
        </div>
    </div>
@endsection
