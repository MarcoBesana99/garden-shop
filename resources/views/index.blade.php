@extends('layouts.base', ['enParam' => 'en', 'ruParam' => 'ru'])
@section('title')
{{ __('Greenhouses, garden showers and more.') }}
@endsection
@section('content')
    <div class="rellax" id="heroContainer">
        <div class="overlay"></div>
        <div class="container h-100" id="hero">
            <div class="row h-100">
                <div class="h-100 col-md-7 d-flex flex-column justify-content-center">
                    <h1 class="font-weight-bold">
                        {{ __('For those, looking for the best solutions of their gardens and yards') }}</h1>
                    <div class="mt-4 subtitle"><span>{{ __('Wholesale in bulk quantities') }} </span><span> {{ __('from 150 units') }}</span></div>
                    <div>
                        <a href="{{ route('contact', app()->getLocale()) }}" class="btn custom-btn mt-4">
                            {{ __('Get a quote') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="benefits">
        <div class="container search-container">
            <div class="row p-4 rounded justify-content-center align-content-center search">
                <div class="col-12 col-md-6 d-flex align-items-center">
                    <h4 class="font-weight-bold">{{ __('Browse our products') }}</h4>
                </div>
                <div class="col-12 col-md-6">
                    <form action="" method="GET" class="d-flex" id="filterForm">
                        <select name="category" class="form-control" id="categorySelect">
                            <option value="default">{{ __('Select a category') }}</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->slug }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                        <button type="submit" class="btn custom-btn ml-3">{{ __('Search') }}</button>
                    </form>
                    <div id="searchError" class="mt-2" style="display: none; color:red">
                        {{ __('Please select a category.') }}</div>
                </div>
            </div>
        </div>
        <div id="benefitsRow">
            <div class="container row">
                <div class="col-md-6 col-lg-3 text-center">
                    <h3 class="font-weight-bold">{{ __('Diversification') }}</h3>
                    <i class="fas fa-clipboard-list benefit-icon mt-3"></i>
                    <p class="mt-3">
                        {{ __('We offer a wide range of goods for summer houses, yards (greenhouses, mini greenhouses, garden arbors, summer garden showers and other goods in bulk) that can be viewed in the "Catalog" section.') }}
                    </p>
                </div>
                <div class="col-md-6 col-lg-3 text-center">
                    <h3 class="font-weight-bold">{{ __('Individual Service') }}</h3>
                    <i class="far fa-handshake benefit-icon mt-3"></i>
                    <p class="mt-3">
                        {{ __('Individual approach and selection of goods based on preferences of each market in Europe, Russia and Belarus.') }}
                    </p>
                </div>
                <div class="col-md-6 col-lg-3 text-center">
                    <h3 class="font-weight-bold">{{ __('High Quality') }}</h3>
                    <i class="far fa-check-circle benefit-icon mt-3"></i>
                    <p class="mt-3">
                        {{ __('All goods are manufactured using unique and modern technologies from quality raw materials and undergo quality control at all stages of production.') }}
                    </p>
                </div>
                <div class="col-md-6 col-lg-3 text-center">
                    <h3 class="font-weight-bold">{{ __('Good Prices') }}</h3>
                    <i class="fas fa-hand-holding-usd benefit-icon mt-3"></i>
                    <p class="mt-3">
                        {{ __('Only on our website, you can order all products presented under the section "Catalog" in bulk quantities from 150 units at the most competitive prices.') }}
                    </p>
                </div>
            </div>
        </div>
        <div id="formSection">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7 mb-4">
                        <h2 class="font-weight-bold mb-2 text-white text-center mt-5 mb-3">{{ __('Our latest products') }}</h2>
                        <div class="owl-carousel owl-theme owl-last-products">
                            @foreach ($latestProducts as $product)
                                <div>
                                    <a class="text-decoration-none"
                                        href="{{ route('show.product', [app()->getLocale(), $product->category->slug, $product->slug]) }}">
                                        <h3 class="text-white mb-3 text-center font-weight-bold">{{ $product->name }}
                                        </h3>
                                    </a>
                                    <a
                                        href="{{ route('show.product', [app()->getLocale(), $product->category->slug, $product->slug]) }}">
                                        <img style="width: 60%" class="mr-auto ml-auto"
                                            src="{{ asset('img/' . json_decode($product->images_path)[0]) }}"
                                            alt="{{ $product->name }}">
                                    </a>
                                </div>
                            @endforeach
                        </div>
                        <div class="d-flex justify-content-center">
                            <a href="{{ route('catalog', app()->getLocale()) }}" class="mt-3 btn custom-btn btn-block"
                                style="width: 60%; background: #21243d !important">{{ __('Our catalog') }}</a>
                        </div>
                    </div>
                    <div class="col-lg-5 form-col">
                        <livewire:form />
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script type="text/javascript">
        $(function() {
            //dynamic form action
            const filterBtn = $('#filterForm button')
            filterBtn.click((e) => {
                e.preventDefault()
                let value = $("#categorySelect :selected").val();
                if (value == 'default')
                    $('#searchError').show().fadeOut(6500)
                else {
                    let form = document.getElementById("filterForm")
                    form.action = window.location.href + '/{{ __('categories') }}/' + value
                    form.submit()
                }
            })
        });
        $(".owl-carousel").owlCarousel({
            loop: true,
            margin: 30,
            responsiveClass: true,
            dots: true,
            center: true,
            autoplay: true,
            autoplayTimeout: 2000,
            autoplayHoverPause: true,
            responsive: {
                0: {
                    items: 1,
                },
                600: {
                    items: 1,
                },
                1000: {
                    items: 1,
                }
            }
        });

    </script>
@endpush
