@extends('layouts.front', ['class' => ''])
<style>
    /* Latest compiled and minified CSS included as External Resource*/

    /* Optional theme */

    /*@import url('//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-theme.min.css');*/
    body {
        margin-top:30px;
    }
    .stepwizard-step p {
        margin-top: 0px;
        color:#666;
    }
    .stepwizard-row {
        display: table-row;
    }
    .stepwizard {
        display: table;
        width: 100%;
        position: relative;
    }
    .stepwizard-step button[disabled] {
        /*opacity: 1 !important;
        filter: alpha(opacity=100) !important;*/
    }
    .stepwizard .btn.disabled, .stepwizard .btn[disabled], .stepwizard fieldset[disabled] .btn {
        opacity:1 !important;
        color:#bbb;
    }
    .stepwizard-row:before {
        top: 14px;
        bottom: 0;
        position: absolute;
        content:" ";
        width: 100%;
        height: 1px;
        background-color: #ccc;
        z-index: 0;
    }
    .stepwizard-step {
        display: table-cell;
        text-align: center;
        position: relative;
    }
    .btn-circle {
        width: 30px;
        height: 30px;
        text-align: center;
        padding: 6px 0;
        font-size: 12px;
        line-height: 1.428571429;
        border-radius: 15px;
    }
</style>
<style type="text/css">


    h1,h2,h3,h4{
        padding: 0px;
        margin: 0px;
    }

    .caption-style-3{
        list-style-type: none;
        margin: 0px;
        padding: 0px;

    }

    .caption-style-3 li{
        float: left;
        padding: 0px;
        position: relative;
        overflow: hidden;
    }

    .caption-style-3 li:hover .caption{
        opacity: 1;
        transform: translateY(-100px);
        -webkit-transform:translateY(-100px);
        -moz-transform:translateY(-100px);
        -ms-transform:translateY(-100px);
        -o-transform:translateY(-100px);
    }

    .caption-style-3 li:hover img{
        opacity: 1;
        transform: translateY(-40px);
        -webkit-transform:translateY(-40px);
        -moz-transform:translateY(-40px);
        -ms-transform:translateY(-40px);
        -o-transform:translateY(-40px);

    }


    .caption-style-3 img{
        margin: 0px;
        padding: 0px;
        float: left;
        z-index: 0;
    }


    .caption-style-3 .caption{
        cursor: pointer;
        position: absolute;
        opacity: 0;
        top:300px;
        -webkit-transition:all 0.15s ease-in-out;
        -moz-transition:all 0.15s ease-in-out;
        -o-transition:all 0.15s ease-in-out;
        -ms-transition:all 0.15s ease-in-out;
        transition:all 0.15s ease-in-out;

    }

    .caption-style-3 img{
        -webkit-transition:all 0.15s ease-in-out;
        -moz-transition:all 0.15s ease-in-out;
        -o-transition:all 0.15s ease-in-out;
        -ms-transition:all 0.15s ease-in-out;
        transition:all 0.15s ease-in-out;

    }
    .caption-style-3 .blur{
        background-color: rgb(237 30 38 / 87%);
        height: 300px;
        width: 400px;
        z-index: 5;
        position: absolute;
    }

    .caption-style-3 .caption-text h1{
        text-transform: uppercase;
        font-size: 18px;
    }
    .caption-style-3 .caption-text{
        z-index: 10;
        color: #fff;
        position: absolute;
        width: 400px;
        height: 300px;
        text-align: center;
        top:20px;
    }


    /** Nav Menu */
    ul.nav-menu{
        padding: 0px;
        margin: 0px;
        list-style-type: none;
        width: 490px;
        margin: 60px auto;
    }

    ul.nav-menu li{
        display: inline;
        margin-right: 10px;
        padding:10px;
        border: 1px solid #ddd;
    }

    ul.nav-menu li a{
        color: #eee;
        text-decoration: none;
        text-transform: uppercase;
    }

    ul.nav-menu li a:hover, ul.nav-menu li a.active{
        color: #2c3e50;
    }
    /** content **/
    .content{
        margin-top: 100px;
        margin-left: 100px;
        width: 700px;
    }
    .content h1, .content h2{
        font-family: "Source Sans Pro",sans-serif;
        color: #ecf0f1;
        padding: 0px;
        margin: 0px;
        font-weight: normal;
    }

    .content h1{
        font-weight: 900;
        font-size: 64px;
    }

    .content h2{
        font-size:26px;
    }

    .content p{
        color: #ecf0f1;
        font-family: "Lato";
        line-height: 28px;
        font-size: 15px;
        padding-top: 50px;
    }

    p.credit{
        padding-top: 20px;
        font-size: 12px;
    }

    p a{
        color: #ecf0f1;
    }

    /** fork icon**/
    .fork{
        position: absolute;
        top:0px;
        left: 0px;
    }

</style>
@section('content')
    @role('client')
    <div>
    @foreach ($orders_user as $order_user)
        {{--            {{ dd($order_user) }}--}}
        @isset($order_user['orders_user'])
            @foreach ($order_user[ "orders_user"] as $ord_us)
{{--                {{ $ord_us->id  }}--}}


                @foreach ($orders as $order)
{{--                    {{ dd($order) }}--}}
                    @isset($order['orders'])
                        {{--            {{ dd($order) }}--}}
                            @foreach ($order[ "orders"] as $ord)

                                @if($ord->order_id==$ord_us->id)
                                    @if($ord->finished!=1)
{{--                                    @if($ord->status_id!=7 and $ord->comment!='driver_app')--}}
                                        @if($ord->status_id==1)
                                            <div class="row" style="    width: 100%;">
                                                <div class="col-md-12 text-center">
{{--                                                    <a class="btn badge badge-danger badge-pill" href="http://restorani.onestopshop.mk/orders/{{$ord->order_id}}">#{{$ord_us->id}}</a>--}}
{{--                                                    <h4>One Stop Shop ја прими вашата нарачка и истата се процесира</h4>--}}
                                                </div>

                                            </div>

                                        @endif
                                    @endif
                                @endif
                            @endforeach
{{--                        <div class="stepwizard container" style="margin-top: 1%;" >--}}
{{--                            <div class="stepwizard-row setup-panel">--}}
{{--              --}}
{{--                            </div>--}}
{{--                        </div>--}}
                        {{--            @forelse (isset($order['orders'])?$order['orders']:[] as $test)--}}

                        {{--            @endforelse--}}
                        {{--            {{dd($order)}}--}}
                        {{--            @foreach($order['orders'] as $or)--}}
                        {{--{{dd($or)}}--}}
                        {{--            @endforeach--}}
                        {{--            @forelse (isset($order['orders'])?$order['orders']:[] as $or)--}}
                        {{--            @endforelse--}}
                    @endisset
                @endforeach
            @endforeach
        @endisset
    @endforeach
    </div>
    @endrole
    @if( !request()->get('location') )
        @include('layouts.headers.search')
    @else
        @include('layouts.headers.filters')
    @endif
{{--    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">--}}
{{--    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>--}}
{{--    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>--}}

    <div class="container">

    @foreach ($sections as $section)

        <section class="section" id="main-content">
            <div class="container mt--100">
{{--                <h2>Најдобрите македонски специјалитети и оброци најдете ги на One Stop Shop</h2>--}}
                @isset($section['super_title'])
                    <h3 class="super_title text-center" style="opacity: 100%; font-weight: bold">Наша препорака</h3>
                @endisset

                <br />
                <div class="row">
                    <!-- Stores -->
                    @isset($section['restorants'])
                        @forelse ($section['restorants'] as $restorant)
                            <?php $link=route('show.vendor',['alias'=>$restorant->alias]); ?>
                            <div class="col-xl-3 col-lg-4 col-md-4 col-sm-4">
                                <div class="strip">
                                    <figure>
                                    <a href="{{ $link }}"><img src="{{ $restorant->logom }}" data-src="{{ config('global.restorant_details_image') }}" class="img-fluid lazy" alt=""></a>
                                    </figure>
                                    <span class="res_title"><b><a href="{{ $link }}">{{ $restorant->name}}</a></b></span><span class="float-right"><i class="fa fa-star" style="color: #dc3545"></i> <strong>{{ number_format($restorant->averageRating, 1, '.', ',') }} <span class="small">/ 5 ({{ count($restorant->ratings) }})</strong></span></span><br />
                                    <span class="res_description">{{ $restorant->description}}</span><br />
                                    <span class="res_mimimum">{{ __('Minimum order') }}: @money($restorant->minimum, env('CASHIER_CURRENCY','usd'),true)</span>
                                </div>
                            </div>
                            @empty
                            <div class="col-md-12">
                            <p class="text-muted mb-0">Нема податоци од пребарувањето!</p>
                            </div>

                        @endforelse
                    @endisset

{{--                    @isset($section['citiess'])--}}
{{--                        @forelse (isset($section['citiess'])?$section['citiess']:[] as $city)--}}


{{--                        @endforelse--}}
{{--                    @endisset--}}
                    <!-- Cities преправено е во ресторани -->
                    @isset($section['cities'])
                        <div class="container-a3">
                            <ul class="caption-style-3">
                        @forelse (isset($section['cities'])?$section['cities']:[] as $city)
                            <?php $link=route('show.vendor',['city'=>$city->alias]); ?>


                                        <a href="{{ $link }}">
                                        <li>
                                            <img src="http://restorani.onestopshop.mk/uploads/restorants/{{ $city->logo }}_large.jpg" style="width: 100%">
                                            <div class="caption" style="width: 100%;">
                                                <div class="blur" style="width: 100%;"></div>
                                                <div class="caption-text">
                                                    <h1 style="font-size: 30px;
    font-weight: bold; color: white">{{ $city->name}}</h1>
                                                    <p>{{ $city->description}}</p>
                                                </div>
                                            </div>
                                        </li>
                                        </a>

{{--                        {{dd($city)}}--}}
{{--                                <table class="table">--}}
{{--                                    <thead>--}}
{{--                                    <tr>--}}
{{--                                        <th scope="col"></th>--}}
{{--                                        <th scope="col"></th>--}}
{{--                                        <th scope="col"></th>--}}
{{--                                        <th scope="col"></th>--}}
{{--                                    </tr>--}}
{{--                                    </thead>--}}
{{--                                    <tbody>--}}
{{--                                    <tr>--}}
{{--                                        <th scope="row"><a href="{{ $link }}">--}}
{{--                                                <img src="http://restorani.onestopshop.mk/uploads/restorants/{{ $city->logo }}_large.jpg"  data-src="{{ config('uploads.restorants.restorant_details_image') }}" class="img-fluid lazy" alt="">--}}
{{--                                            </a></th>--}}
{{--                                        <td>Mark</td>--}}
{{--                                        <td>Otto</td>--}}
{{--                                        <td>@mdo</td>--}}
{{--                                    </tr>--}}
{{--                                    </tbody>--}}
{{--                                </table>--}}

{{--                                <div class="col-md-3 col-xs-6 col-sm-6" style="width: 50%">--}}
{{--                                <div class="">--}}


{{--                                        <a href="{{ $link }}">--}}
{{--                                       <img src="http://restorani.onestopshop.mk/uploads/restorants/{{ $city->logo }}_large.jpg"  data-src="{{ config('uploads.restorants.restorant_details_image') }}" class="img-fluid lazy" alt="">--}}
{{--                                        </a>--}}

{{--                                        <span class="city_title mt--1"><b><a class="text-white" href="{{ $link }}">{{ $city->name}}</a></b></span><br />--}}
{{--                                        <a href="{{ $link }}" class="city_letter mt--1 text-red fade-in">{{ $city->name[1]}}</a>--}}

{{--                                    <div class="cbp-title-dark">--}}
{{--                                        <div class="times-wrap" style="margin-top: 6px;--}}
{{--    display: block;--}}
{{--    position: relative;--}}
{{--    width: 100%;--}}
{{--    background-color: #eee;--}}
{{--    min-height: 27px;">--}}
{{--                                            <div class="wrap-time" style="background-color: #eee;--}}
{{--    color: #111;--}}
{{--    margin-right: 5px;--}}
{{--    font-size: 13px;--}}
{{--    padding: 4px 10px;--}}
{{--    float: right;"><i class="fa fa-clock-o"></i> 30-60 мин.</div>--}}
{{--                                            <div class="wrap-delivery"><img class="dostava-img" src="https://www.kliknijadi.mk/Images/mali/dostava.png"> {{ $city->static_fee}} ден.</div>--}}
{{--                                        </div>--}}
{{--                                        <div style="    text-align: center;--}}
{{--    margin-top: 10px;--}}
{{--    font-weight: 700;--}}
{{--    color: #222;--}}
{{--    font-size: 20px;--}}
{{--    font: 700 17px/24px " class="cbp-l-grid-agency-title">{{ $city->name}}</div>--}}
{{--                                        <div class="cbp-l-grid-agency-desc"></div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                    <button class="btn" style="    margin-top: -50%;--}}
{{--    background: red;--}}
{{--    width: 90%;--}}
{{--    color: white;--}}

{{--    margin-left: 5%;--}}
{{--    padding: .0rem 1.25rem;--}}
{{--">{{ $city->name}}</button>--}}
{{--                            </div>--}}
                            @empty
                            <div class="col-md-12">
                            <p class="text-muted mb-0">Нема податоци од пребарувањето!</p>
                            </div>

                        @endforelse
                            </ul>
                        </div>
                    @endisset

                </div>



            </div>
        </section>
    @endforeach


    @if(config('global.playstore') || config('global.appstore'))
    <hr>
    <section class="row row-grid align-items-center mt section" style="  ">
        <div class="container py-md">
            <div class="row justify-content-between align-items-center">
            <div class="col-lg-6">
                <!--<h3 class="text-primary mb-2">{{ __('Download the food you love') }}</h3>
                <h4 class="mb-0 font-weight-light">{{ __('It`s all at your fingertips - the restaurants you love') }}. {{ __ ('Find the right food to suit your mood, and make the first bite last') }}. {{ __('Go ahead, download us') }}.</h4>-->
                <h2 class="">{{ __(config('global.mobile_info_title')) }}</h2>

                <h4 class="mb-0 font-weight-light">{{ __(config('global.mobile_info_subtitle')) }}</h4>
            </div>
            <div class="col-lg-6 text-lg-center btn-wrapper">
                <div class="row">
                    @if(config('global.playstore'))
                    <div class="col-6">
                        <a href="{{config('global.playstore')}}" target="_blank"><img class="img-fluid" src="/default/playstore.png" alt="..."/></a>
                    </div>
                    @endif
                    @if(config('global.appstore'))
                    <div class="col-6">
                        <a href="{{config('global.appstore')}}" target="_blank"><img class="img-fluid" src="/default/appstore.png" alt="..."/></a>
                    </div>
                    @endif
                </div>
            </div>
            </div>
        </div>
    </section>
@endif

@endsection

@section('js')
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=<?php echo env('GOOGLE_MAPS_API_KEY',''); ?>&libraries=places"></script>
    <script>
    var IsplaceChange = false;
    $(document).ready(function () {
        var input = document.getElementById('txtlocation');
        var autocomplete = new google.maps.places.Autocomplete(input, {  });

        google.maps.event.addListener(autocomplete, 'place_changed', function () {
            var place = autocomplete.getPlace();

            IsplaceChange = true;
        });

        $("#txtlocation").keydown(function () {
            IsplaceChange = false;
        });

        $("#btnsubmit").click(function () {

            if (IsplaceChange == false) {
                $("#txtlocation").val('');
                alert("please Enter valid location");
            }
            else {
                alert($("#txtlocation").val());
            }

        });

        $("#search_location").click(function () {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function(position) {
                    var pos = { lat: position.coords.latitude, lng: position.coords.longitude };

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $.ajax({
                        type:'POST',
                        url: '/search/location',
                        dataType: 'json',
                        data: {
                            lat: position.coords.latitude,
                            lng: position.coords.longitude
                        },
                        success:function(response){
                            if(response.status){
                                $("#txtlocation").val(response.data.formatted_address);
                            }
                        }, error: function (response) {
                        //alert(response.responseJSON.errMsg);
                        }
                    })
                    }, function() {

                    });
                } else {
                // Browser doesn't support Geolocation
                //handleLocationError(false, infoWindow, map.getCenter());
            }
        });
    });
</script>
@endsection
