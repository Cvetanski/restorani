<ul class="navbar-nav">
    @if (!config('app.isqrsaas'))
    <li class="nav-item">
        <a class="nav-link" href="{{ route('home') }}">
            <i class="ni ni-tv-2 text-primary"></i> Работна табла
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="/live">
            <i class="ni ni-basket text-success"></i> Нарачки во живо<div class="blob red"></div>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('orders.index') }}">
            <i class="ni ni-basket text-orange"></i> Нарачки
        </a>
    </li>
    @endif

    <li class="nav-item">
        <a class="nav-link" href="{{ route('restorants.edit',  auth()->user()->restorant->id) }}">
            <i class="ni ni-shop text-info"></i> Ресторани
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('items.index') }}">
            <i class="ni ni-collection text-pink"></i> Мени
        </a>
    </li>

    @if (config('app.isqrsaas'))
        <li class="nav-item">
            <a class="nav-link" href="{{ route('qr') }}">
                <i class="ni ni-mobile-button text-red"></i> {{ __('QR Builder') }}
            </a>
        </li>
    @endif

    @if(env('ENABLE_PRICING',false))
        <li class="nav-item">
            <a class="nav-link" href="{{ route('plans.current') }}">
                <i class="ni ni-credit-card text-orange"></i> {{ __('Plan') }}
            </a>
        </li>
    @endif
    @if (!config('app.isqrsaas'))
        @if(env('ENABLE_FINANCES_OWNER',true))
            <li class="nav-item">
                <a class="nav-link" href="{{ route('finances.owner') }}">
                    <i class="ni ni-money-coins text-blue"></i> Финансии
                </a>
            </li>
        @endif
    @endif


    <!--<li class="nav-item mb-5" style="position: absolute; bottom: 0;">
        <a class="nav-link" href="/" target="_blank">
            <i class="ni ni-world"></i> {{ __('Visit Site') }}
        </a>
    </li>-->
</ul>
