<!-- Footer -->
<footer class="text-center text-lg-start text-white">
    <!-- Section: Social media -->
    {{-- <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
        <!-- Left -->
        <div class="me-5 d-none d-lg-block">
            <span>Get connected with us on social networks:</span>
        </div>
        <!-- Left -->

        <!-- Right -->
        <div>
            <a href="" class="me-4 text-reset">
                <i class="fab fa-facebook-f"></i>
            </a>
            <a href="" class="me-4 text-reset">
                <i class="fab fa-twitter"></i>
            </a>
            <a href="" class="me-4 text-reset">
                <i class="fab fa-google"></i>
            </a>
            <a href="" class="me-4 text-reset">
                <i class="fab fa-instagram"></i>
            </a>
            <a href="" class="me-4 text-reset">
                <i class="fab fa-linkedin"></i>
            </a>
            <a href="" class="me-4 text-reset">
                <i class="fab fa-github"></i>
            </a>
        </div>
        <!-- Right -->
    </section> --}}
    <!-- Section: Social media -->

    <!-- Section: Links  -->
    <section>
        <div class="container text-center text-md-start pt-4">
            <!-- Grid row -->
            <div class="row mt-3">
                <!-- Grid column -->
                <div class="col-md-3 col-lg-4 col-xl-3 mx-auto">
                    <!-- Content -->
                    <h6 class="text-uppercase mb-4 font-weight-bold">
                        {{ __('Eurazijos agro') }}
                    </h6>
                    <p>
                        {{ __('For those, looking for the best solutions of their gardens and yards') }}.
                    </p>
                    <p>
                        {{ __('Wholesale in bulk quantities from 150 units') }}.
                    </p>
                </div>
                <!-- Grid column -->
                <hr class="footer-divider">
                <!-- Grid column -->
                <div class="col-md-3 col-lg-2 col-xl-2 mx-auto">
                    <!-- Links -->
                    <h6 class="text-uppercase font-weight-bold mb-4 mt-1">
                        {{ __('pages') }}
                    </h6>
                    <p>
                        <a href="{{ route('home', app()->getLocale()) }}"
                            class="text-reset text-capitalize">{{ __('home') }}</a>
                    </p>
                    <p>
                        <a href="{{ route('catalog', app()->getLocale()) }}"
                            class="text-reset text-capitalize">{{ __('catalog') }}</a>
                    </p>
                    <p>
                        <a href="{{ route('about', app()->getLocale()) }}"
                            class="text-reset text-capitalize">{{ __('about') }}</a>
                    </p>
                    <p>
                        <a href="{{ route('contact', app()->getLocale()) }}"
                            class="text-reset text-capitalize">{{ __('contact') }}</a>
                    </p>
                    <p>
                        <a href="{{ route('privacy', app()->getLocale()) }}" class="text-reset text-capitalize">{{ __('privacy policy') }}</a>
                    </p>
                </div>
                <!-- Grid column -->
                <hr class="footer-divider">
                <!-- Grid column -->
                <div class="col-md-6 col-lg-6 col-xl-7 mx-auto mb-md-0">
                    <!-- Links -->
                    <h6 class="text-uppercase font-weight-bold mb-4 mt-2">
                        {{ __('contact') }}
                    </h6>
                    <div class="row">
                        <div class="col-md-6">
                            <p>
                                <i class="fas fa-envelope me-3"></i>
                                eurazijos@mail.ru
                            </p>
                            <p><i class="fas fa-phone me-3"></i> +370 60780165</p>
                            <p><i class="fas fa-phone me-3"></i>+370 67129929</p>
                            <p><i class="fas fa-home me-3"></i> Ukmerge Vilniaus g. 100B-45, LT-20166. Lithuania</p>
                        </div>
                        <hr class="footer-divider" style="width: 25% !important">
                        <div class="col-md-6">
                            <p>
                                <i class="fas fa-envelope me-3"></i>
                                bthtatiana@gmail.com
                            </p>
                            <p><i class="fas fa-phone me-3"></i> +375 296399939</p>
                            <p><i class="fas fa-phone me-3"></i>+375 (33) 395-49-10</p>
                            <p><i
                                    class="fas fa-home me-3"></i>{{ __('18b Dzerzhinskogo St., Tsnyanka, Minsk district. Belarus') }}
                            </p>
                        </div>
                    </div>
                </div>
                <!-- Grid column -->
            </div>
            <!-- Grid row -->
        </div>
    </section>
    <!-- Section: Links  -->

    <!-- Copyright -->
    <div class="text-center p-4 copyright">
        © 2021 Copyright:
        <a class="text-reset fw-bold" href="https://eurazijos-agro.com/">eurazijos-agro.com</a>
    </div>
    <!-- Copyright -->
</footer>
<!-- Footer -->
