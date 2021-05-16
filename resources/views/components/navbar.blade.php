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
                        class="nav-link {{ Route::currentRouteName() == 'catalog' ? 'active' : '' }}">
                        {{ __('Catalog') }}
                    </a>
                </li>
            </ul>
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        Test
                    </a>
                </li>
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <select class="form-control" onchange="location = this.value">
                        <option value="{{ route(Route::currentRouteName(), $enParam) }}"
                            {{ app()->getLocale() == 'en' ? 'selected' : '' }}>EN</option>
                        <option value="{{ route(Route::currentRouteName(), $ruParam) }}"
                            {{ app()->getLocale() == 'ru' ? 'selected' : '' }}>RU</option>
                    </select>
                </li>
            </ul>
        </div>
    </div>
</nav>
