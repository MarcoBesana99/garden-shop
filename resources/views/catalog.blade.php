@extends('layouts.base', ['enParam' => 'en', 'ruParam' => 'ru'])
@section('title')
{{ __('Catalog') }}
@endsection
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
                    <h1 class="mb-3 bread text-capitalize">{{ __('catalog') }}</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="bg-white position-relative">
        <div class="container p-4">
            <h2 class="font-weight-bold mt-3 mb-5 page-title text-capitalize">{{ __('what we offer') }}</h2>
            <x-catalog />
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
