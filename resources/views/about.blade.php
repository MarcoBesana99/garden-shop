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
                    <h1 class="mb-3 bread text-capitalize">{{ __('About') }}</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="bg-white position-relative">
        <div class="container p-4">
            <h2 class="font-weight-bold mt-3 mb-5 page-title text-capitalize">{{ __('our story') }}</h2>
            <p>{{ __('Eurazijos vezejas began its activities by providing transportation and logistics services in the markets of Europe, the CIS and Central Asia.') }}
            </p>
            <p>{{ __('Currently, the company is expanding its scope of activities and one of the directions is the wholesale of goods for summer houses, gardens and orchards from the leading manufacturers of the Republic of Belarus. The company provides its customers a full range of services in buying goods.') }}
            </p>
            <p>{{ __('Employees of the company will provide competent and expert advice, and its own fleet of cars helps to make quick delivery to all European regions.') }}
            </p>
            <p>{{ __('Close partnership with factories-manufacturers allows to expand the line of supplied goods to the maximum') }}.
            </p>
            <p>{{ __('Thanks to this, today we can offer our customers') }}:
            </p>
            <ul style="padding-left: 15px">
                <li>
                    {{ __('Metal frames for home and farming') }}
                </li>
                <li>
                    {{ __('Steel frames made of different-sized profile pipes (20×20, 20×40, 25×25) and of different thickness from 0.67 to 1.2') }}
                </li>
                <li>
                    {{ __('Frames with connectors and all-welded') }}
                </li>
            </ul>
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
