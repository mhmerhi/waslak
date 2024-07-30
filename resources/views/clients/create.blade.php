@extends('layouts.dashboard')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Add New Order</h3>
        </div>
        <div class="card-body">

    <form action="{{ route('clients.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="row">
            <div class="form-group col-md-6">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}" required>
                @error('name')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group col-md-6">
                <label for="phone">Phone</label>
                <input type="text" id="phone" name="phone" class="form-control" value="{{ old('phone') }}" required>
                @error('phone')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="row">
            <div class="form-group col-md-6">
                <label for="address">Address</label>
                <input type="text" id="address" name="address" class="form-control" value="{{ old('address') }}" required>
                @error('address')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group col-md-6">
                <label for="description">Description</label>
                <textarea id="description" name="description" class="form-control">{{ old('description') }}</textarea>
            </div>
        </div>

        <div class="row">
            <div class="form-group">
                <label class="form-check-label" for="has_account">Has Account</label>
                <input type="checkbox" name="has_account" id="has_account" class="form-check-input" {{ old('has_account') ? 'checked' : '' }}>
            </div>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Save Client</button>
    </form>
        </div>
    </div>
@endsection
