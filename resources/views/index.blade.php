@extends('layouts.base', ['enParam' => 'en', 'ruParam' => 'ru'])
@section('content')
    <div class="rellax" id="heroContainer">
        <div id="overlay"></div>
        <div class="container h-100" id="hero">
            <div class="row h-100">
                <div class="h-100 col-md-7 d-flex flex-column justify-content-center">
                    <h1 class="font-weight-bold">{{ __('For those, looking for the best solutions of their gardens and yards') }}</h1>
                    <div class="mt-4 subtitle">{{ __('Wholesale in bulk quantities from 150 units') }}</div>
                    <div>
                        <button class="btn custom-btn mt-4">
                            {{ __('Get a quote') }}
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="rellax" data-rellax-speed="2" id="benefits">
        <div class="container">
            <div class="row p-4 rounded justify-content-center align-content-center">
                <div class="col-12 col-md-6 d-flex align-items-center">
                    <h5 class="font-weight-bold">{{ __('Browse our products') }}</h5>
                </div>
                <div class="col-12 col-md-6">
                    <form action="{{ route('filtered.products', app()->getLocale()) }}" method="GET" class="d-flex">
                        <select name="category" class="form-control">
                            <option>{{ __('Select a category') }}</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                        <button type="submit" class="btn btn-primary ml-3">{{ __('Search') }}</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="row" id="benefitsRow">
            <div class="col-md-3 text-center">
                <h4 class="font-weight-bold">{{ __('Diversification of products') }}</h4>
                <i class="fas fa-hand-holding-usd benefit-icon mt-3"></i>
                <p class="mt-3">{{ __('We offer a wide range of goods for summer houses, yards (greenhouses, mini greenhouses, garden arbors, summer garden showers and other goods in bulk) that can be viewed in the "Catalog" section.') }}
                </p>
            </div>
            <div class="col-md-3 text-center">
                <h4 class="font-weight-bold">{{ __('Individual Service') }}</h4>
                <i class="far fa-handshake benefit-icon mt-3"></i>
                <p class="mt-3">{{ __('Individual approach and selection of goods based on preferences of each market in Europe, Russia and Belarus.') }}
                </p>
            </div>
            <div class="col-md-3 text-center">
                <h4 class="font-weight-bold">{{ __('High Quality') }}</h4>
                <i class="far fa-check-circle benefit-icon mt-3"></i>
                <p class="mt-3">{{ __('All goods are manufactured using unique and modern technologies from quality raw materials and undergo quality control at all stages of production.') }}
                </p>
            </div>
            <div class="col-md-3 text-center">
                <h4 class="font-weight-bold">{{ __('Good Prices') }}</h4>
                <i class="fas fa-hand-holding-usd benefit-icon mt-3"></i>
                <p class="mt-3">{{ __('we offer a wide range of goods for dacha, garden and vegetable garden. With us you can buy greenhouses, mini greenhouses, garden arbors, summer garden showers and other goods in bulk and at bargain prices.') }}
                </p>
            </div>
        </div>
    </div>
    <div class="container mt-4">
        <livewire:form />
        <x-catalog />
    </div>
@endsection
@push('scripts')
    <script src="https://cdn.jsdelivr.net/gh/dixonandmoe/rellax@master/rellax.min.js"></script>
    <script type="text/javascript">
        $(function() {
            new Rellax('.rellax');
            $(document).scroll(() => {
                let $nav = $("#navbarMenu");
                $nav.toggleClass('scrolled', $(this).scrollTop() > $nav.height());
            });
        });

    </script>
@endpush
