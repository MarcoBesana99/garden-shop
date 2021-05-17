@extends('layouts.app')
@section('content')
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header font-weight-bold">{{ $description->translate('en')->title }} |
                        {{ $description->translate('ru')->title }}</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <h6 class="font-weight-bold">{{ __('English Content') }}</h6>
                                <p>{{ $description->translate('en')->content }}</p>
                            </div>
                            <div class="col-md-6">
                                <h6 class="font-weight-bold">{{ __('Russian Content') }}</h6>
                                <p>{{ $description->translate('ru')->content }}</p>
                            </div>
                        </div>
                        @if ($description->images_path != null)
                            <div class="row">
                                <div class="col-12">
                                    <h6 class="font-weight-bold">{{ __('Images') }}</h6>
                                </div>
                                @foreach (json_decode($description->images_path) as $image)
                                    <div class="col-md-3 mt-3">
                                        <img class="mw-100" src="{{ asset('img/descriptions/' . $image) }}"
                                            alt="{{ $description->translate('en')->title }}">
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
