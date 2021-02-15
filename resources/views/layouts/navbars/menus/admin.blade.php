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
                    @if (!env('DISABLE_DELIVER',false))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('drivers.index') }}">
                            <i class="ni ni-delivery-fast text-pink"></i> Добавувачи
                        </a>
                    </li>
                    @endif
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('clients.index') }}">
                            <i class="ni ni-single-02 text-blue"></i> Клиенти
                        </a>
                    </li>
                @endif


                <li class="nav-item">
                    <a class="nav-link" href="{{ route('restorants.index') }}">
                        <i class="ni ni-shop text-info"></i> Ресторани
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('reviews.index') }}">
                        <i class="ni ni-diamond text-info"></i> {{ __('Reviews') }}
                    </a>
                </li>

                @if(env('MULTI_CITY',false))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('cities.index') }}">
                        <i class="ni ni-building text-orange"></i> Градови
                    </a>
                </li>
                @endif


                <li class="nav-item">
                    <a class="nav-link" href="{{ route('pages.index') }}">
                        <i class="ni ni-ungroup text-info"></i> Страници
                    </a>
                </li>

                @if(env('ENABLE_PRICING',false))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('plans.index') }}">
                        <i class="ni ni-credit-card text-orange"></i> {{ __('Pricing plans') }}
                    </a>
                </li>
                @endif

                @if(!config('app.isqrsaas')&&env('ENABLE_FINANCES_ADMIN',true))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('finances.admin') }}">
                            <i class="ni ni-money-coins text-blue"></i> Финансии
                        </a>
                    </li>

                @endif

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('settings.index') }}">
                        <i class="ni ni-settings text-black"></i> Подесувања
                    </a>
                </li>

                @if (env('is_demo',false))
                    <li class="nav-item">
                        <a class="nav-link" target="_blank" href="#">
                            <i class="ni ni-active-40 text-black"></i> {{ __('ENV Editor') }} ( {{__('disabled in demo') }} )
                        </a>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" target="_blank" href="{{ url('admin/env') }}">
                            <i class="ni ni-active-40 text-black"></i> {{ __('ENV Editor') }}
                        </a>
                    </li>
                @endif

                <!--
                <li class="nav-item">
                    <a class="nav-link active" href="#navbar-examples" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="navbar-examples">
                        <i class="fab fa-laravel" style="color: #f4645f;"></i>
                        <span class="nav-link-text" style="color: #f4645f;">{{ __('Laravel Examples') }}</span>
                    </a>

                    <div class="collapse show" id="navbar-examples">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('profile.edit') }}">
                                    {{ __('User profile') }}
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('user.index') }}">
                                    {{ __('User Management') }}
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="ni ni-planet text-blue"></i> {{ __('Icons') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="ni ni-pin-3 text-orange"></i> {{ __('Maps') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="ni ni-key-25 text-info"></i> {{ __('Login') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="ni ni-circle-08 text-pink"></i> {{ __('Register') }}
                    </a>
                </li>-->
                <!--<li class="nav-item mb-5" style="position: absolute; bottom: 0;">
                    <a class="nav-link" href="/" target="_blank">
                        <i class="ni ni-world"></i> {{ __('Visit Site') }}
                    </a>
                </li>-->
            </ul>
