@extends('layouts.app')
@section('content')
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header font-weight-bold">
                        {{ $clientRequest->first_name . ' ' . $clientRequest->last_name }}</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <h6 class="font-weight-bold">{{ __('Email') }}</h6>
                                <p>{{ $clientRequest->email }}</p>
                            </div>
                            <div class="col-md-6">
                                <h6 class="font-weight-bold">{{ __('Phone') }}</h6>
                                <p>{{ $clientRequest->phone }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <h6 class="font-weight-bold">{{ __('Company') }}</h6>
                                @if ($clientRequest->company != '')
                                    <p>{{ $clientRequest->company }}</p>
                                @else
                                    <p>No Company</p>
                                @endif
                            </div>
                            <div class="col-md-6">
                                <h6 class="font-weight-bold">{{ __('Products') }}</h6>
                                @if (json_decode($clientRequest->products) != null)
                                    <p>{{ json_decode($clientRequest->products)[0] }}</p>
                                @else
                                    <p>No Products</p>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <h6 class="font-weight-bold">{{ __('Message') }}</h6>
                                <p>{{ $clientRequest->message }}</p>
                            </div>
                            <div class="col-md-6">
                                <h6 class="font-weight-bold">{{ __('Status') }}</h6>
                                <p>{{ $clientRequest->status }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function() {
            $('.alert').fadeOut(4500)
        })

    </script>
@endsection
