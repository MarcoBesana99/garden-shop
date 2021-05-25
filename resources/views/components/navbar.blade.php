<nav class="navbar navbar-expand-md navbar-dark shadow-sm fixed-top" id="navbarMenu">
    <div class="container">
        <a class="navbar-brand font-weight-bold" href="{{ route('home', app()->getLocale()) }}">
            {{ __('Eurazijos agro') }}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="{{ route('home', app()->getLocale()) }}"
                        class="nav-link {{ Route::currentRouteName() == 'home' ? 'active' : '' }}">
                        {{ __('Home') }}
                    </a>
                </li>
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="{{ route('catalog', app()->getLocale()) }}"
                        class="nav-link text-capitalize {{ Route::currentRouteName() == 'catalog' ? 'active' : '' }}">
                        {{ __('catalog') }}
                    </a>
                </li>
            </ul>
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a href="{{ route('about', app()->getLocale()) }}" class="nav-link text-capitalize {{ Route::currentRouteName() == 'about' ? 'active' : '' }}">
                        {{ __('about') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('contact', app()->getLocale()) }}" class="nav-link text-capitalize {{ Route::currentRouteName() == 'contact' ? 'active' : '' }}">
                        {{ __('contact') }}
                    </a>
                </li>
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <select class="form-control" onchange="location = this.value">
                        @foreach ($urls as $url)
                            <option value="{{ $url['url'] }}"
                                {{ app()->getLocale() == $url['locale'] ? 'selected' : '' }}>
                                {{ strtoupper($url['locale']) }}
                            </option>
                        @endforeach
                    </select>
                </li>
                <i class="united states flag"></i>
            </ul>
        </div>
    </div>
</nav>
