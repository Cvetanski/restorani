@extends('layouts.app', ['title' => __('User Profile')])

@section('content')
    @include('users.partials.header', [
        'title' => __(''),
    ])

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
                        <div class="row">


{{--{{ dd($restorani_obicni) }}--}}
@foreach($restorani as $restoran_id)
    @foreach($restorani_obicni as $ro)
        @if($ro->id==$restoran_id->id)
{{--    {{ $restoran_id->id }}--}}

                                <div class="col-md-2">
                                    <a href="http://restorani.onestopshop.mk/profile/my_restaurant/{{ $ro->id }}">
                                    <img src="http://restorani.onestopshop.mk/uploads/restorants/{{ $ro->logo }}_large.jpg" style="width: 100%">
                                    </a>
                                </div>

                                @endif
                        @endforeach
                        @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.footers.auth')
    </div>
@endsection
