<li @class([
    'nav-item',
    'menu-open' => Route::currentRouteNamed($route),
])>
    <a href="" @class([
        'nav-link',
        'active' => Route::currentRouteNamed($route),
    ])>
        <i class="nav-icon {{ $icon }}"></i>
        <p>
            {{ $title }}
            <i class="fas fa-angle-left right"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">

        {{ $slot }}

    </ul>
</li>
