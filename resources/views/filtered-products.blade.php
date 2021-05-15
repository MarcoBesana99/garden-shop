@extends('layouts.base', ['enParam' => $enParam, 'ruParam' => $ruParam])
@section('content')
<div class="container p-4">
    <h2 class="font-weight-bold mt-5">{{ $slug }}</h2>
    <div class="row catalog-filter">
        @foreach ($products as $product)
            <div class="col-lg-4 col-md-6 mt-4">
                <div class="catalog-item">
                    <div class="pi-pic set-bg rounded"
                        data-setbg="{{ asset('img/' . json_decode($product->images_path)[0]) }}">
                        <div class="label">For rent</div>
                    </div>
                    <div class="pi-text">
                        <div class="pt-price">$ 289.0<span>/month</span></div>
                        <h5><a href="{{ route('show.product', [app()->getLocale(), $slug, $product->slug]) }}">{{ $product->name }}</a></h5>
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
@endsection
@push('scripts')
    <script>
        $(document).ready(() => {
            $('.set-bg').each(function() {
                let bg = $(this).data('setbg');
                $(this).css('background-image', 'url(' + bg + ')');
            });
            $('.navbar').css('background-color', '#24A148')
        })

    </script>
@endpush