<div class="container">
    <div class="row">
        <div class="col-12">
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
            <div class="col-lg-4 col-md-6 mix all {{ strtolower($product->category->slug) }}">
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
