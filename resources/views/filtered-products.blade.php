@extends('layouts.base', ['enParam' => $enParam, 'ruParam' => $ruParam])
@section('content')
    <div class="rellax top-section">
        <div class="overlay"></div>
        <div class="top-section__container h-100">
            <div class="row h-100 align-items-center justify-content-center">
                <div class="h-100 col-md-9 d-flex flex-column justify-content-center align-items-center text-center">
                    <p class="breadcrumbs">
                        <span class="mr-2"><a href="{{ route('home', app()->getLocale()) }}">{{ __('Home') }}
                                <i class="fa fa-chevron-right"></i></a></span>
                        <span>{{ __('categories') }} <i class="fa fa-chevron-right"></i></span>
                    </p>
                    <h1 class="mb-3 bread text-capitalize">{{ $slug }}</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="rellax" data-rellax-speed="2" style="background-color: white">
        <div class="container p-4">
            <h2 class="font-weight-bold mt-5">{{ $slug }}</h2>
            <div class="row catalog-filter">
                @foreach ($products as $product)
                    <div class="col-lg-4 col-md-6 mt-4">
                        <div class="catalog-item">
                            <a href="{{ route('show.product', [app()->getLocale(), $slug, $product->slug]) }}">
                                <div class="pi-pic set-bg rounded"
                                    data-setbg="{{ asset('img/' . json_decode($product->images_path)[0]) }}">
                                    <div class="label">For rent</div>
                                </div>
                            </a>
                            <div class="pi-text">
                                <h5><a
                                        href="{{ route('show.product', [app()->getLocale(), $slug, $product->slug]) }}">{{ $product->name }}</a>
                                </h5>
                                <p><span class="icon_pin_alt"></span>{{ $product->description }}</p>
                                <ul>
                                    <li><i class="fa fa-object-group"></i> 2, 283</li>
                                    <li><i class="fa fa-bathtub"></i> 03</li>
                                    <li><i class="fa fa-bed"></i> 05</li>
                                    <li><i class="fa fa-automobile"></i> 01</li>
                                </ul>
                                <div class="pi-agent">
                                    <div class="pa-item">
                                        <div class="pa-info">
                                            <img src="img/catalog/posted-by/pb-1.jpg" alt="">
                                            <h6>Ashton Kutcher</h6>
                                        </div>
                                        <div class="pa-text">
                                            123-455-688
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
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
