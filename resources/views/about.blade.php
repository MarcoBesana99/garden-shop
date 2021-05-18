@extends('layouts.base', ['enParam' => 'en', 'ruParam' => 'ru'])
@section('content')
    <div class="rellax top-section">
        <div class="overlay"></div>
        <div class="top-section__container h-100">
            <div class="row h-100 align-items-center justify-content-center">
                <div class="h-100 col-md-9 d-flex flex-column justify-content-center align-items-center text-center">
                    <p class="breadcrumbs">
                        <span class="mr-2"><a href="{{ route('home', app()->getLocale()) }}">{{ __('Home') }}
                                <i class="fa fa-chevron-right"></i></a></span>
                    </p>
                    <h1 class="mb-3 bread text-capitalize">{{ __('about') }}</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="rellax" data-rellax-speed="2" style="background-color: white">
        <div class="container p-4">
          
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        $(document).ready(() => {
            $('.set-bg').each(function() {
                let bg = $(this).data('setbg');
                $(this).css('background-image', 'url(' + bg + ')');
            });
        })

    </script>
@endpush
