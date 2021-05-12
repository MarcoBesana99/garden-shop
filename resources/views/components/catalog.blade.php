<div class="container">
    <div class="row">
        <div class="col-lg-5">
            <div class="section-title">
                <h4>{{ __('Our Catalog') }}</h4>
            </div>
        </div>
        <div class="col-lg-7">
            <div class="catalog-controls">
                <ul>
                    <li data-filter="all">{{ __('All') }}</li>
                    @foreach ($categories as $category)
                        <li data-filter="{{ '.' . strtolower($category->name) }}">{{ $category->name }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    <div class="row catalog-filter">
        @foreach ($products as $product)
            <div class="col-lg-4 col-md-6 mix all {{ strtolower($product->category->name) }}">
                <div class="catalog-item">
                    <div class="pi-pic set-bg rounded"
                        data-setbg="{{ asset('img/' . json_decode($product->images_path)[0]) }}">
                        <div class="label">For rent</div>
                    </div>
                    <div class="pi-text">
                        <div class="pt-price">$ 289.0<span>/month</span></div>
                        <h5><a href="#">{{ $product->name }}</a></h5>
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
@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/mixitup/3.3.1/mixitup.min.js"
        integrity="sha512-nKZDK+ztK6Ug+2B6DZx+QtgeyAmo9YThZob8O3xgjqhw2IVQdAITFasl/jqbyDwclMkLXFOZRiytnUrXk/PM6A=="
        crossorigin="anonymous">
    </script>
    <script>
        $(document).ready(() => {
            $('.catalog-controls li').on('click', function() {
                $('.catalog-controls li').removeClass('active');
                $(this).addClass('active');
            });
            if ($('.catalog-filter').length > 0) {
                let containerEl = document.querySelector('.catalog-filter');
                mixitup(containerEl);
            }
            $('.set-bg').each(function() {
                let bg = $(this).data('setbg');
                $(this).css('background-image', 'url(' + bg + ')');
            });
        })

    </script>
@endpush
