@extends('layouts.app', ['title' => __('Orders')])

@section('content')

asd
{{--    <div class="card-body">--}}
{{--        <h6 class="heading-small text-muted mb-4">Информации за Нарачка</h6>--}}
{{--        @include('partials.flash')--}}
{{--        <div class="pl-lg-4">--}}
{{--            <form method="post" action="{{ route('order-update', $order) }}" autocomplete="off" enctype="multipart/form-data">--}}
{{--                @csrf--}}
{{--                @method('put')--}}
{{--                <input type="hidden" id="rid" value="{{ $order->id }}"/>--}}
{{--                @include('partials.fields',['fields'=>[--}}
{{--                     ['ftype'=>'input','address'=>"Адреса на нарачлката",'id'=>"address",'placeholder'=>"Адреса",'required'=>true,'value'=>$order->address],--}}
{{--                ]]);--}}

@endsection

{{--@section('head')--}}
{{--    <link type="text/css" href="{{ asset('custom') }}/css/rating.css" rel="stylesheet">--}}
{{--@endsection--}}

{{--@section('js')--}}
{{--    <script src="{{ asset('custom') }}/js/ratings.js"></script>--}}
{{--@endsection--}}

