@extends('layouts.dashboard')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Edit Client</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('clients.update', $client->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="name">Name</label>
                        <input type="text" id="name" name="name" class="form-control" value="{{ $client->name }}" required>
                        @error('name')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group col-md-6">
                        <label for="phone">Phone</label>
                        <input type="text" id="phone" name="phone" class="form-control" value="{{ $client->phone }}" required>
                        @error('phone')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="address">Address</label>
                        <input type="text" id="address" name="address" class="form-control" value="{{ $client->address }}" required>
                        @error('address')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group col-md-6">
                        <label for="description">Description</label>
                        <textarea id="description" name="description" class="form-control">{{ $client->description }}</textarea>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-6">
                        <label class="form-check-label" for="has_account">Has Account</label>
                        <input type="checkbox" name="has_account" id="has_account" class="form-check-input" {{ $client->has_account ? 'checked' : '' }}>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary mt-3">Update Client</button>
            </form>
        </div>
    </div>
@endsection
