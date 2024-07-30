@php use App\Models\Role; @endphp
@extends('layouts.dashboard')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Edit User</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('users.update', ['id' => $user->id]) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="first_name">First name <span class="color-red">*</span></label>
                    <input type="text" name="first_name" id="first_name" class="form-control"
                           value="{{ $user->first_name }}">
                    @error('first_name')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="last_name">Last name <span class="color-red">*</span></label>
                    <input type="text" name="last_name" id="last_name" class="form-control"
                           value="{{ $user->last_name }}">
                    @error('last_name')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email">Email <span class="color-red">*</span></label>
                    <input type="email" name="email" id="email" class="form-control" value="{{ $user->email }}">
                    @error('email')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" class="form-control">
                    @error('password')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="year_of_birth">Year of birth <span class="color-red">*</span></label>
                    <select name="year_of_birth" id="year_of_birth" class="form-control">
                        <option value="">Select Year</option>
                        @for ($year = date("Y"); $year >= 1920; $year--)
                            <option
                                value="{{ $year }}" {{ $user->year_of_birth == $year ? 'selected' : '' }}>{{ $year }}</option>
                        @endfor
                    </select>
                    @error('year_of_birth')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="phone">Phone <span class="color-red">*</span></label>
                    <input type="text" name="phone" id="phone" class="form-control"
                           value="{{ $user->phone }}">
                    @error('phone')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
        <button type="submit" class="btn btn-primary mt-4">Update</button>
        </form>
    </div>
    </div>
@endsection
