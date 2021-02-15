
<nav id="navbar-main" class="navbar navbar-light navbar-expand-lg fixed-top" style="background: white">
  <div class="container-fluid">
      <a class="navbar-brand mr-lg-5" href="/">
        <img src="{{ config('global.site_logo') }}">
      </a>

      @if( request()->get('location') )
      <span style="z-index: 10" class="">{{ __('DELIVERING TO')}} :  <b>{{request()->get('location')}}</b></span> <a   data-toggle="modal"  href="#locationset"><span class="ml-sm-2 search description">({{ __('change')}})</span></a>






      @endif
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar_global" aria-controls="navbar_global" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="navbar-collapse collapse" id="navbar_global">
        <div class="navbar-collapse-header">
          <div class="row">
            <div class="col-6 collapse-brand">
              <a href="#">
                <img src="{{ config('global.site_logo') }}">
              </a>
            </div>
            <div class="col-6 collapse-close">
              <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbar_global" aria-controls="navbar_global" aria-expanded="false" aria-label="Toggle navigation">
                <span></span>
                <span></span>
              </button>
            </div>
          </div>
        </div>
        <ul class="navbar-nav align-items-lg-center ml-lg-auto">

              <ul class="navbar-nav navbar-nav-hover align-items-lg-center">
                  <li class="nav-item dropdown">
                      @auth()
                          @include('layouts.menu.partials.auth')
                      @endauth
                      @guest()
                          @include('layouts.menu.partials.guest')
                      @endguest
                  </li>

                  <li class="mobile-menu">
                      @if(\Request::route()->getName() != "cart.checkout")
                          <a  id="mobileCartLink" onclick="openNav()" style=" color: #ed1d25 !important; " class="nav-link" style="cursor:pointer;">
                              <i class="fa fa-shopping-cart"></i>
                              <span class="nav-link-inner--text">Кошница</span>
                          </a>
                      @endif


                  </li>
              </ul>
            <li class="web-menu">

                @if(\Request::route()->getName() != "cart.checkout")
                    <a  id="desCartLink" onclick="openNav()" class="btn btn-neutral btn-icon btn-cart" style="cursor:pointer;">
                  <span class="btn-inner--icon">
                    <i class="fa fa-shopping-cart"></i>
                  </span>
                        <span class="nav-link-inner--text">Кошница</span>
                    </a>
                @endif

            </li>
          <li class="nav-item">
            <a class="nav-link nav-link-icon" style=" color: #ed1d25 !important; " href="{{ config('global.facebook') }}" target="_blank" data-toggle="tooltip" title="{{ __('Like us on Facebook') }}">
              <i style="color: #ed1c24" class="fa fa-facebook-square"></i>
              <span class="nav-link-inner--text d-lg-none">{{ __('Facebook') }}</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link nav-link-icon" style=" color: #ed1d25 !important; " href="{{ config('global.instagram') }}" target="_blank" data-toggle="tooltip" title="{{ __('Follow us on Instagram') }}">
              <i style="color: #ed1c24" class="fa fa-instagram"></i>
              <span class="nav-link-inner--text d-lg-none">{{ __('Instagram') }}</span>
            </a>
          </li>
            @if (!env('SINGLE_MODE',false))
                <li class="nav-item">
                    <a data-mode="popup" style="color: #ed1c24 !important;" target="_blank" class="button nav-link nav-link-icon" href="{{ route('newrestaurant.register') }}">Регистрирај го твојот ресторан</a>
                </li>
            @endif
        </ul>
      </div>
    </div>

  </nav>
