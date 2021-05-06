@extends('layouts.app')
@section('content')
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header font-weight-bold">{{ $product->translate('en')->name }} |
                        {{ $product->translate('ru')->name }}</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <h6 class="font-weight-bold">{{ __('English Description') }}</h6>
                                <p>{{ $product->translate('en')->description }}</p>
                            </div>
                            <div class="col-md-6">
                                <h6 class="font-weight-bold">{{ __('Russian Description') }}</h6>
                                <p>{{ $product->translate('ru')->description }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <h6 class="font-weight-bold">{{ __('English Category') }}</h6>
                                <p>{{ $product->category->translate('en')->name }}</p>
                            </div>
                            <div class="col-md-6">
                                <h6 class="font-weight-bold">{{ __('Russian Category') }}</h6>
                                <p>{{ $product->category->translate('ru')->name }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12"><h6 class="font-weight-bold">{{ __('Images') }}</h6></div>
                            @foreach (json_decode($product->images_path) as $image)
                                <div class="col-md-3 mt-3">
                                    <img class="mw-100" src="{{ asset('img/' . $image) }}"
                                        alt="{{ $product->translate('en')->name }}">
                                </div>
                            @endforeach
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
