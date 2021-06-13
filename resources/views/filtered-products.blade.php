@extends('layouts.base', ['enParam' => $enParam, 'ruParam' => $ruParam])
@section('title')
{{ $categoryName }}
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
                        <span>{{ __('categories') }} <i class="fa fa-chevron-right"></i></span>
                    </p>
                    <h1 class="mb-3 bread text-capitalize">{{ $categoryName }}</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="bg-white position-relative">
        <div class="container p-4">
            <h2 class="font-weight-bold mt-3 mb-5 page-title text-capitalize">{{ __('what we offer') }}</h2>
            <div class="row catalog-filter">
                @foreach ($products as $product)
                    <div class="col-lg-4 col-md-6 mix all {{ strtolower($product->category->name) }}">
                        <div class="catalog-item">
                            <a
                                href="{{ route('show.product', [app()->getLocale(), $product->category->slug, $product->slug]) }}">
                                <div class="pi-pic set-bg rounded"
                                    data-setbg="{{ asset('img/' . json_decode($product->images_path)[0]) }}">
                                </div>
                                <div class="pi-text">
                                    <h5>{{ $product->name }}</h5>
                                </div>
                            </a>
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
