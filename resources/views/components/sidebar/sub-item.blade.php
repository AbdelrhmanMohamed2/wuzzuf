<li class="pl-2 nav-item">
    <a href="{{ route($route) }}" @class([
        'nav-link',
        'active' => Route::currentRouteNamed($route),
    ])>
        <i class="nav-icon {{ $icon }}"></i>
        <p> {{ $title }}</p>
    </a>
</li>
