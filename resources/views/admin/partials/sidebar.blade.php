<div class="c-sidebar c-sidebar-dark c-sidebar-fixed c-sidebar-lg-show" id="sidebar">
    <div class="c-sidebar-brand d-lg-down-none">
        {{ __('Eurazijos agro') }}
    </div>
    <ul class="c-sidebar-nav ps ps--active-y">
        <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{ route('admin.dashboard') }}">
                <i class="fas fa-tachometer-alt c-sidebar-nav-icon"></i>{{ __('Dashboard') }}</a></li>
        </li>
        <li class="c-sidebar-nav-title">{{ __('Categories') }}</li>
        <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{ route('admin.categories.index') }}">
                <i class="fas fa-edit c-sidebar-nav-icon"></i>{{ __('Categories') }}</a></li>
        <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{ route('admin.categories.create') }}">
                <i class="fas fa-plus c-sidebar-nav-icon"></i>{{ __('Submit Category') }}</a></li>

        <li class="c-sidebar-nav-title">{{ __('Products') }}</li>
        <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{ route('admin.products.index') }}">
                <i class="fas fa-edit c-sidebar-nav-icon"></i>{{ __('Products') }}</a></li>
        <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{ route('admin.products.create') }}">
                <i class="fas fa-plus c-sidebar-nav-icon"></i>{{ __('Submit Product') }}</a></li>
        <li class="c-sidebar-nav-title">{{ __('Requests') }}</li>
        <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{ route('admin.requests.new.requests') }}">
                <i class="fas fa-envelope-open-text c-sidebar-nav-icon"></i>{{ __('New Requests') }}</a></li>
        <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{ route('admin.requests.index') }}">
                <i class="fas fa-list c-sidebar-nav-icon"></i>{{ __('All Requests') }}</a></li>
        <li class="c-sidebar-nav-title">{{ __('Others') }}</li>
        <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{ route('admin.logout') }}" onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
                <i class="fas fa-sign-out-alt c-sidebar-nav-icon"></i>{{ __('Logout') }}
            </a>
            <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" class="d-none">
                @csrf
            </form>
    </ul>
    <button class="c-sidebar-minimizer c-class-toggler" type="button" data-target="_parent"
        data-class="c-sidebar-minimized"></button>
</div>
