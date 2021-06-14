@extends('layouts.app')
@section('content')
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header font-weight-bold">
                        <a href="{{ route('admin.products.index') }}"><i class="far fa-arrow-alt-circle-left mr-3" style="color: gray; font-size: 20px"></i></a>
                        {{ $product->translate('en')->name }} |
                        {{ $product->translate('ru')->name }}</div>
                    <div class="card-body">
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
                        <div class="row mt-4">
                            <div class="col-md-6">
                                <h6 class="font-weight-bold">{{ __('English Sizes') }}</h6>
                                <p>{!! $product->translate('en')->sizes !!}</p>
                            </div>
                            <div class="col-md-6">
                                <h6 class="font-weight-bold">{{ __('Russian Sizes') }}</h6>
                                <p>{!! $product->translate('ru')->sizes !!}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <h6 class="font-weight-bold">{{ __('English Features') }}</h6>
                                <p>{!! $product->translate('en')->features !!}</p>
                            </div>
                            <div class="col-md-6">
                                <h6 class="font-weight-bold">{{ __('Russian Features') }}</h6>
                                <p>{!! $product->translate('ru')->features !!}</p>
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
