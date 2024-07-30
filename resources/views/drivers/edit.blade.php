@extends('layouts.dashboard')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Edit Driver</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('drivers.update', $driver->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="name">Name</label>
                        <input type="text" id="name" name="name" class="form-control" value="{{ $driver->name }}" required>
                        @error('name')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group col-md-6">
                        <label for="phone">Phone</label>
                        <input type="text" id="phone" name="phone" class="form-control" value="{{ $driver->phone }}" required>
                        @error('phone')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-6">
                        <label class="form-check-label" for="activated">Activated</label>
                        <input type="checkbox" name="activated" id="activated" class="form-check-input" {{ $driver->activated ? 'checked' : '' }}>
                    </div>

                    <div class="form-group col-md-6">
                        <label class="form-check-label" for="has_account">Has Account</label>
                        <input type="checkbox" name="has_account" id="has_account" class="form-check-input" {{ $driver->has_account ? 'checked' : '' }}>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary mt-3">Update Driver</button>
            </form>
        </div>
    </div>
@endsection
