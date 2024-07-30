@extends('layouts.notification')

@section('content')
    <h1>Hi, {{ $name }}!</h1>
    <p>Your request {{ $request->name }} with quantity {{ $request->quantity }} has been approved by <b>{{ $submitted_by }}</b> whose phone number is {{ $submitted_by_phone }}, and it is ready to be delivered!</p>
@endsection
