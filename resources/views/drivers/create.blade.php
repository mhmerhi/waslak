@extends('layouts.dashboard')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Add New Driver</h3>
        </div>
        <div class="card-body">

    <form action="{{ route('drivers.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="row">
            <div class="form-group col-md-4">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}" required>
                @error('name')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group col-md-4">
                <label for="phone">Phone</label>
                <input type="text" id="phone" name="phone" class="form-control" value="{{ old('phone') }}" required>
                @error('phone')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group col-md-4">
                <label for="type">Type</label>
                <select name="type" id="type" class="form-control">
                    <option value="">Select Type</option>
                    <option value="Small" {{ old('type') == 'Small' ? 'selected' : '' }}>Small</option>
                    <option value="Medium" {{ old('type') == 'Medium' ? 'selected' : '' }}>Medium</option>
                    <option value="Large" {{ old('type') == 'Large' ? 'selected' : '' }}>Large</option>
                    <option value="XLarge" {{ old('type') == 'XLarge' ? 'selected' : '' }}>XLarge</option>
                </select>
                @error('phone')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="row">
            <div class="form-group col-md-4">
                <label class="form-check-label" for="activated">Activated</label>
                <input type="checkbox" name="activated" id="activated" class="form-check-input" {{ old('activated') ? 'checked' : '' }}>
            </div>

            <div class="form-group col-md-4">
                <label class="form-check-label" for="has_account">Has Account</label>
                <input type="checkbox" name="has_account" id="has_account" class="form-check-input" {{ old('has_account') ? 'checked' : '' }}>
            </div>

            <div class="form-group col-md-4">
                <label class="form-check-label" for="recorder">Recorded</label>
                <input type="checkbox" name="recorded" id="recorded" class="form-check-input" {{ old('recorded') ? 'checked' : '' }}>
            </div>
        </div>

        <div class="row">
            <div class="form-group col-md-6">
                <label class="form-check-label" for="activated">Address</label>
                <textarea name="address" id="address" class="form-control">{{ old('address') }}</textarea>
            </div>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Save Driver</button>
    </form>
        </div>
    </div>
@endsection
