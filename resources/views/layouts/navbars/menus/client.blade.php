<ul class="navbar-nav">
    <li class="nav-item">
        <a class="nav-link" href="{{ route('orders.index') }}">
            <i class="ni ni-basket text-orange"></i> Мои нарачки
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('addresses.index') }}">
            <i class="ni ni-map-big text-green"></i> Мои адреси
        </a>
    </li>
    <li>
        <a class="nav-link" href="{{ route('my_restaurants') }}">
            <i class="ni ni-app text-blue"></i>        Нарачки од мои ресторани
        </a>
    </li>
{{--    <li class="nav-item mb-5" style="position: absolute; bottom: 0;">--}}
{{--        <a class="nav-link" href="/" target="_blank">--}}
{{--            <i class="ni ni-world"></i> {{ __('Visit Site') }}--}}
{{--        </a>--}}
{{--    </li>--}}
</ul>
