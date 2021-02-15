@extends('layouts.front', ['class' => ''])
@section('content')
    <section class="section-profile-cover section-shaped my--1 d-none d-md-none d-lg-block d-lx-block">
        <!-- Circles background -->
        <img class="bg-image " src="{{ config('global.restorant_details_cover_image') }}" style="width: 100%;">
        <!-- SVG separator -->
        <div class="separator separator-bottom separator-skew">

        </div>
    </section>
    <section class="section bg-secondary">

        <div class="container">

            <div class="row">

<?php
//
//
//$clientId = "180000114";			//Merchant Id defined by bank to user
////$amount = "9.95";					//Transaction amount
////$oid = "4654";							//Order Id. Must be unique. If left blank, system will generate a unique one.
//
//$okUrl = "http://restorani.onestopshop.mk";		//URL which client be redirected if authentication is successful
//$failUrl = "http://localhost:88/3DPayHosting/3DPayHostingResultPage.php";	//URL which client be redirected if authentication is not successful
//
//$rnd = microtime();				//A random number, such as date/time
//$currencyVal = "807";			//Currency code, 949 for TL, ISO_4217 standard
//$storekey = "SKEY0114";			//Store key value, defined by bank.
//$storetype = "3D_PAY_HOSTING";	//3D authentication model
//$lang = "mk";					//Language parameter, "tr" for Turkish (default), "en" for English
//$instalment = "";				//Instalment count, if there's no instalment should left blank
//$transactionType = "Auth";		//transaction type
//
//$hashstr = $clientId . $oid . $amount . $okUrl . $failUrl .$transactionType. $instalment .$rnd . $storekey;
//
//$hash = base64_encode(pack('H*',sha1($hashstr)));
//?>
<form method="post" action="https://epay.halkbank.mk/fim/est3Dgate">
    <div class="col-md-12">
        <h5>Потврдете ја вашата нарачка</h5>
        <input type="submit" value="Submit" class="btn btn-primary" />
    </div>

    <input type="hidden" name="encoding" value="UTF-8">

        <input type="hidden" name="clientid" value="{{$clientId}}" />
{{--        @foreach($last_order as $order)--}}
        <input type="hidden" name="amount" value="{{$last_order->delivery_price + $last_order->order_price }}" />
        <input type="hidden" name="oid" value="{{ $last_order->id }}" />
{{--        @endforeach--}}
        <input type="hidden" name="islemtipi" value="{{$transactionType}}" />
        <input type="hidden" name="taksit" value="{{ $instalment }}" />
        <input type="hidden" name="okUrl" value="{{$okUrl}}" />
        <input type="hidden" name="failUrl" value="{{$failUrl}}" />
        <input type="hidden" name="rnd" value="{{ $rnd }}" />
        <input type="hidden" name="hash" value="{{ $hash }}" />
        <input type="hidden" name="storetype" value="{{$storetype}}" />
        <input type="hidden" name="lang" value="{{$lang}}" />
        <input type="hidden" name="currency" value="{{$currencyVal}}" />
        <input type="hidden" name="refreshtime" value="10" />

</form>
            </div>


        </div>
        @include('clients.modals')
    </section>
@endsection
@section('js')
    <script async defer src= "https://maps.googleapis.com/maps/api/js?key=<?php echo env('GOOGLE_MAPS_API_KEY',''); ?>&callback=initAddressMap"></script>
    <script src="https://js.stripe.com/v3/"></script>
    <script>
        var STRIPE_KEY="{{ env('STRIPE_KEY',"") }}";
        var ENABLE_STRIPE="{{ env('ENABLE_STRIPE',false) }}";
        var initialOrderType="{{ !env('DISABLE_DELIVER',false)?'delivery':'pickup' }}";
    </script>
    <script src="{{ asset('custom') }}/js/checkout.js"></script>
@endsection
