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

            <div class="row text-center">
                <div class="col-md-12 text-center">
                    <h5 class="text-center" style="color: red">Вашата транскација е неуспешна, ве молиме обидете се повторно!</h5>

                </div>

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
