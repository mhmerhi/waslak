@extends('layouts.dashboard')

@section('content')
        <div class="row">
{{--            <div class="col-md-12">--}}

{{--                <div class="row mt-4">--}}
{{--                    <div class="col-12">--}}
{{--                        <h4><b>Others Requests</b></h4>--}}
{{--                    </div>--}}
{{--                    @if(count($otherRequests) < 1)--}}
{{--                        <div>--}}
{{--                            No Requests--}}
{{--                        </div>--}}
{{--                    @else--}}
{{--                        @foreach($otherRequests as $request)--}}
{{--                            <div class="card col-md-3 mb-3" style="padding: 0">--}}
{{--                                <div class="card-header" style="background-color: green; color: white;">{{ __('Request') }}</div>--}}

{{--                                <div class="card-body">--}}
{{--                                    <h5 class="card-title">{{ $request->name }}</h5>--}}
{{--                                    <p class="card-text">Quantity: {{ $request->quantity }}</p>--}}
{{--                                    <p class="card-text">Requested by: {{ $request->user->first_name }} {{ $request->user->first_name }}</p>--}}
{{--                                    <p class="card-text">Phone: {{ $request->user->phone }}</p>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        @endforeach--}}
{{--                    @endif--}}
{{--                </div>--}}

{{--                <div class="row mt-4">--}}
{{--                    <div class="col-12">--}}
{{--                        <h4><b>My Requests</b></h4>--}}
{{--                    </div>--}}
{{--                    @if(count($requests) < 1)--}}
{{--                        <div>--}}
{{--                            No Requests--}}
{{--                        </div>--}}
{{--                    @else--}}
{{--                        @foreach($requests as $request)--}}
{{--                            <div class="card col-md-3 mb-3" style="padding: 0">--}}
{{--                                <div class="card-header" style="background-color: red; color: white;">{{ __('Request') }}</div>--}}

{{--                                <div class="card-body">--}}
{{--                                    <h5 class="card-title">{{ $request->name }}</h5>--}}
{{--                                    <p class="card-text">Quantity: {{ $request->quantity }}</p>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        @endforeach--}}
{{--                    @endif--}}
{{--                </div>--}}

{{--                <div class="row mt-4">--}}
{{--                    <div class="col-12">--}}
{{--                        <h4><b>My Approved Requests</b></h4>--}}
{{--                    </div>--}}
{{--                    @if(count($approvedRequests) < 1)--}}
{{--                        <div>--}}
{{--                            No Requests--}}
{{--                        </div>--}}
{{--                    @else--}}
{{--                        @foreach($approvedRequests as $approvedRequest)--}}
{{--                            <div class="card col-md-3 mb-3" style="padding: 0">--}}
{{--                                <div class="card-header" style="background-color: blue; color: white;">{{ __('Request') }}</div>--}}

{{--                                <div class="card-body">--}}
{{--                                    <h5 class="card-title">{{ $approvedRequest->name }}</h5>--}}
{{--                                    <p class="card-text">Quantity: {{ $approvedRequest->quantity }}</p>--}}
{{--                                    <p class="card-text">Approved by: {{ $approvedRequest->approvedUser->first_name }} {{ $approvedRequest->approvedUser->first_name }}</p>--}}
{{--                                    <p class="card-text">Phone: {{ $approvedRequest->approvedUser->phone }}</p>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        @endforeach--}}
{{--                    @endif--}}
{{--                </div>--}}

{{--                <div class="row mt-4">--}}
{{--                    <div class="col-12">--}}
{{--                        <h4><b>Approved Requests by Me</b></h4>--}}
{{--                    </div>--}}
{{--                    @if(count($requestsApprovedByUser) < 1)--}}
{{--                        <div>--}}
{{--                            No Requests--}}
{{--                        </div>--}}
{{--                    @else--}}
{{--                        @foreach($requestsApprovedByUser as $approvedRequest)--}}
{{--                            <div class="card col-md-3 mb-3" style="padding: 0">--}}
{{--                                <div class="card-header">{{ __('Request') }}</div>--}}

{{--                                <div class="card-body">--}}
{{--                                    <h5 class="card-title">{{ $approvedRequest->name }}</h5>--}}
{{--                                    <p class="card-text">Quantity: {{ $approvedRequest->quantity }}</p>--}}
{{--                                    <p class="card-text">Requested by: {{ $approvedRequest->user->first_name }} {{ $approvedRequest->user->first_name }}</p>--}}
{{--                                    <p class="card-text">Phone: {{ $approvedRequest->user->phone }}</p>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        @endforeach--}}
{{--                    @endif--}}
{{--                </div>--}}
{{--            </div>--}}
        </div>
@endsection
