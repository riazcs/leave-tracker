<style>
    @media (max-width: 767px) {
        .layout-menu {
            display: block !important;
        }
    }
</style>

<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">

    <div class="app-brand demo">
        <a href="/" class="app-brand-link">
            <h4 class="demo menu-text fw-bold ms-2">Leave Tracker</h4>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        @foreach ($menuData[0]->menu as $menu)
        @if (isset($menu->menuHeader))
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">{{ $menu->menuHeader }}</span>
        </li>
        @else
        @php
        $activeClass = null;
        $currentRouteName = Route::currentRouteName();

        if ($currentRouteName === $menu->slug) {
        $activeClass = 'active';
        } elseif (isset($menu->submenu)) {
        if (gettype($menu->slug) === 'array') {
        foreach ($menu->slug as $slug) {
        if (str_contains($currentRouteName, $slug) and strpos($currentRouteName, $slug) === 0) {
        $activeClass = 'active open';
        }
        }
        } else {
        if (str_contains($currentRouteName, $menu->slug) and strpos($currentRouteName, $menu->slug) === 0) {
        $activeClass = 'active open';
        }
        }
        }
        @endphp

        <li class="menu-item {{ $activeClass }}">
            <a href="{{ isset($menu->url) ? url($menu->url) : 'javascript:void(0);' }}" class="{{ isset($menu->submenu) ? 'menu-link menu-toggle' : 'menu-link' }}" @if (isset($menu->target) and !empty($menu->target)) target="_blank" @endif>
                @isset($menu->icon)
                <i class="{{ $menu->icon }}"></i>
                @endisset
                <div>{{ isset($menu->name) ? __($menu->name) : '' }}</div>
            </a>

            @isset($menu->submenu)
            @include('includes.submenu', ['menu' => $menu->submenu])
            @endisset
        </li>
        @endif
        @endforeach

        @role('admin')

        <li class="menu-item">
            <a class="menu-link" href="{{ url('/user/manage') }}">
                <i class="menu-icon tf-icons bx bx-user-circle"></i>
                <div>{{ 'Manage User' }}</div>
            </a>

        </li>

        @endrole
    </ul>

</aside>