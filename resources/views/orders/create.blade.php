@php use App\Enums\OrderType; @endphp
@extends('layouts.dashboard')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Add New Order</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('orders.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="row mb-2">
                    <div class="form-group col-md-6">
                        <label for="type">Type</label>
                        <select id="type" name="type" class="form-control" required>
                            @foreach(OrderType::cases() as $type)
                                <option value="{{ $type->name }}" {{ old('type') == $type->name ? 'selected' : '' }}>{{ $type->value }}</option>
                            @endforeach
                        </select>
                        @error('type')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row mb-2">
                    <div class="form-group col-md-6">
                        <label for="client_id">Client</label>
                        <select id="client_id" name="client_id" class="form-control" required>
                            @foreach($clients as $client)
                                <option value="{{ $client->id }}" {{ old('client_id') == $client->id ? 'selected' : '' }}>{{ $client->name }}</option>
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
                                <option value="{{ $driver->id }}" {{ old('driver_id') == $driver->id ? 'selected' : '' }}>{{ $driver->name }}</option>
                            @endforeach
                        </select>
                        @error('driver_id')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row mb-2">
                    <div class="form-group col-md-6">
                        <label for="from">From</label>
                        <input type="text" id="from" name="from" class="form-control" value="{{ old('from') }}" required>
                        @error('from')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group col-md-6">
                        <label for="to">To</label>
                        <input type="text" id="to" name="to" class="form-control" value="{{ old('to') }}" required>
                        @error('to')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="form-group col-md-6">
                        <label for="cost">Cost</label>
                        <input type="text" id="cost" name="cost" class="form-control" value="{{ old('cost') }}" required>
                        @error('cost')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group col-md-6">
                        <label for="profit">Profit</label>
                        <input type="text" id="profit" name="profit" class="form-control" value="{{ old('profit') }}">
                        @error('profit')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="client_paid">Client Paid</label>
                        <input type="checkbox" id="client_paid" name="client_paid" class="form-check-input" {{ old('client_paid') ? 'checked' : '' }}>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary mt-3">Save Order</button>
            </form>
        </div>
    </div>
@endsection
