@extends('layouts.base')
@section('content')
    <div class="rellax" id="heroContainer">
        <div id="overlay"></div>
        <div class="container h-100" id="hero">
            <div class="row h-100">
                <div class="h-100 d-flex flex-column justify-content-center">
                    <h1>{{ __('Eurazijos-agro') }}</h1>
                    <div class="mt-4">{{ __('test test') }}</div>
                    <div class="btn custom-btn mt-4">
                        {{ __('Get a quote') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="rellax" data-rellax-speed="2" id="benefits">
        <div class="container">
            <div class="row p-4 rounded">
                <div class="col-md-3">
                    <div>Ciao</div>
                    <div>Ciao</div>
                </div>
                <div class="col-md-3">
                    <div>Ciao</div>
                    <div>Ciao</div>
                </div>
                <div class="col-md-3">
                    <div>Ciao</div>
                    <div>Ciao</div>
                </div>
                <div class="col-md-3">
                    <div>Ciao</div>
                    <div>Ciao</div>
                </div>
            </div>
        </div>
        <div class="row" id="benefitsRow">
            <div class="col-md-3 text-center">
                <h4 class="font-weight-bold">{{ __('Good Prices') }}</h4>
                <i class="fas fa-hand-holding-usd benefit-icon mt-3"></i>
                <p class="mt-3">{{ __('We offer a wide range of goods for summer house, garden and vegetable garden. With us you can buy greenhouses, mini greenhouses, garden arbors, summer garden showers and other goods in bulk and at bargain prices.') }}
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
