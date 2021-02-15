@extends('layouts.app', ['title' => __('Orders')])
@section('admin_title')
    Нарачки
@endsection
@section('content')
    <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
    </div>

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <h3 class="col-12 mb-0">Види ги своите нарачки по ресторани</h3>
                        </div>
                    </div>
                    <div class="card-body">

                        <table class="table table-dark">
                            <thead>
                            <tr>
                                <th scope="col">ИД - Код</th>
                                <th scope="col">Ресторан</th>
                                <th scope="col">Начин на плаќање</th>
                                <th scope="col">Ставки</th>
                                <th scope="col">Цена на вкупна нарачка</th>
                                <th scope="col">Цена на достава</th>
                                <th scope="col">Вкупно</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($naracki_od_restorani_po_klient as $naracki_od_restoranKlient)
                            <tr>
                                <th scope="row"> {{ $naracki_od_restoranKlient->id }}</th>
                                <td>
                                    @foreach($restorani as $res)
                                        @if($res->id==$naracki_od_restoranKlient->restorant_id)
                                            {{ $res->name }}
@endif
                                    @endforeach
                                </td>
                                <td>
                                    {{$naracki_od_restoranKlient->payment_method}}
                                </td>
                                <td>
                                    @foreach($naracki_od_restoran as $naracki)
                                        @if($naracki->order_id==$naracki_od_restoranKlient->id)
                                            {{ $naracki->item_name }} ,
                                        @endif
                                    @endforeach
                                </td>
                                <td>
                                {{ $naracki_od_restoranKlient->order_price }}ден
                                </td>
                                <td>
                                    {{ $naracki_od_restoranKlient->delivery_price }}ден
                                </td>
                                <td>
                                    {{ $naracki_od_restoranKlient->order_price+$naracki_od_restoranKlient->delivery_price }}ден
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>


{{--                        <div class="row">--}}
{{--                            {{dd($naracki_od_restoran)}}--}}
{{--                            <thead class="thead-light">--}}
{{--                            <tr>--}}
{{--                                <th scope="col">ИД - Код</th>--}}

{{--                                <th scope="col">Ресторан</th>--}}

{{--                                <th class="table-web" scope="col">Датум на креирање</th>--}}
{{--                                <th class="table-web" scope="col">Начин на плаќање</th>--}}

{{--                                <th class="table-web" scope="col">Ставки</th>--}}

{{--                                <th class="table-web" scope="col">Цена на вкупна нарачка</th>--}}

{{--                            </tr>--}}
{{--                            <br>--}}
{{--                            </thead>--}}
{{--                            <tbody>--}}
{{--                            {{ dd($naracki_od_restorani_po_klient) }}--}}
{{--                            @foreach($naracki_od_restorani_po_klient as $naracki_od_restoranKlient)--}}

{{--                                    {{dd($naracki)}}--}}
{{--                                <tr>--}}
{{--                                    <td class="table-web">--}}
{{--                                    {{ $naracki_od_restoranKlient->id }}--}}
{{--                                    </td>--}}
{{--                                    <td class="table-web">--}}
{{--                                        {{ $naracki->rest_name }}--}}
{{--                                    </td>--}}
{{--                                    <td class="table-web">--}}
{{--                                        {{ $naracki->nacin_na_plakanje }}--}}
{{--                                    </td>--}}
{{--                                    <td class="table-web">--}}
{{--                                        @foreach($naracki_od_restoran as $naracki)--}}
{{--                                            @if($naracki->order_id==$naracki_od_restoranKlient->id)--}}
{{--                                        {{ $naracki->item_name }}--}}
{{--                                            @endif--}}
{{--                                        @endforeach--}}
{{--                                    </td>--}}
{{--                                    <td class="table-web">--}}
{{--                                        {{ $naracki->cena_dostava+$naracki->cena_naracka }}--}}
{{--                                    </td>--}}

{{--                                </tr>--}}
{{--                                <br>--}}

{{--                            @endforeach--}}
{{--                            </tbody>--}}

{{--                        </div>--}}
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.footers.auth')
    </div>
@endsection

