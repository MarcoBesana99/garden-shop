@extends('layouts.base', ['enParam' => 'en', 'ruParam' => 'ru'])
@section('title')
{{ __('Contact') }}
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
                    <h1 class="mb-3 bread text-capitalize">{{ __('contact') }}</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="bg-white position-relative">
        <div class="container p-4">
            <h2 class="font-weight-bold mt-3 mb-5 page-title text-capitalize">{{ __('be in touch with us') }}</h2>
            <div class="row">
                <div class="col-lg-6">
                    <h3>{{ __('Contact details') }}:</h3>
                    <p class="mt-3">{{ __('UAB Eurazijos vezejas Company code 305358431') }}</p>
                    <h4 class="font-weight-bold office">{{ __('Lithuanian office') }}:</h4>
                    <ul class="mt-3" style="padding-left: 15px">
                        <li>Ukmerge Vilniaus g. 100B-45, LT-20166</li>
                        <li>+370 60780165</li>
                        <li>+370 67129929</li>
                        <li>eurazijos@mail.ru</li>
                    </ul>
                    <h4 class="font-weight-bold">{{ __('Office in Belarus') }}:</h4>
                    <ul class="mt-3" style="padding-left: 15px">
                        <li>{{ __('18b Dzerzhinskogo St., Tsnyanka, Minsk district') }}</li>
                        <li>+375 296399939</li>
                        <li>+375 (33) 395-49-10</li>
                        <li>bthtatiana@gmail.com</li>
                    </ul>
                </div>
                <div class="col-lg-6">
                    <livewire:form />
                </div>
            </div>
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
