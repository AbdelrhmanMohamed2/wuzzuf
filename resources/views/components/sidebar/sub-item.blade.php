<li @class(['nav-item', 'pl-2' => $padding])>
    <a href="{{ route($route, $param) }}" @class([
        'nav-link',
        'active' => Route::currentRouteNamed($route),
    ])>
        <i class="nav-icon {{ $icon }}"></i>
        <p> {{ $title }}</p>
    </a>
</li>
