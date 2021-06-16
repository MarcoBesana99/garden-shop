@extends('layouts.base', ['enParam' => $enParam, 'ruParam' => $ruParam])
@section('title')
{{ $product->name }}
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
                        <span class="mr-2">{{ __('categories') }} <i class="fa fa-chevron-right"></i></span>
                        <span><a href="{{ route('show.filtered.products', [app()->getLocale(), $slug]) }}">{{ $slug }}
                                <i class="fa fa-chevron-right"></i></a></span>
                    </p>
                    <h1 class="mb-3 bread text-capitalize">{{ $product->name }}</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="bg-white position-relative">
        <div class="container p-4">
            <h2 class="font-weight-bold mt-3 mb-5 page-title text-capitalize">{{ __('what we offer') }}</h2>
            <div class="owl-carousel owl-theme">
                @foreach (json_decode($product->images_path) as $image)
                    <div>
                        <img src="{{ asset('img/' . $image) }}" alt="{{ $product->name }}">
                    </div>
                @endforeach
            </div>
            <div class="row">
                @if ($product->sizes)
                    <div class="col-lg-6 col-md-6 col-12 mt-4">
                        <h3 class="font-weight-bold mb-3">{{ __('Sizes') }}</h3>
                        {!! $product->sizes !!}
                    </div>
                @endif
                @if ($product->features)
                    <div class="col-lg-6 col-md-6 col-12 mt-4">
                        <h3 class="font-weight-bold mb-3">{{ __('Features') }}</h3>
                        {!! $product->features !!}
                    </div>
                @endif
                @foreach ($descriptions as $desc)
                    <div class="col-md-6 mt-4">
                        <h3 class="font-weight-bold">{{ $desc->title }}</h3>
                        <p class="mt-3">{{ $desc->content }}</p>
                        @if ($desc->images_path != null)
                            <div class="row">
                                @foreach (json_decode($desc->images_path) as $image)
                                    <div class="col-lg-7 col-md-9 col-10 mt-2">
                                        <a href="{{ asset('img/descriptions/' . $image) }}" data-lightbox="$desc->title">
                                            <img class="mw-100" src="{{ asset('img/descriptions/' . $image) }}"
                                                alt="{{ $desc->title }}">
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        @endif
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
            let ifMultiple = false;
            $thisGallery = $(".owl-carousel");
            if($('.owl-item').length > 1)
                ifMultiple = true;
            $thisGallery.owlCarousel({
            loop: ifMultiple,
            margin: 10,
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
                    items: 2,
                },
                1000: {
                    items: 3,
                }
            }
            });
        })

    </script>
@endpush
