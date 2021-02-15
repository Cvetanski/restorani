@extends('layouts.app', ['title' => __('Restaurant Management')])

@section('content')
    @include('restorants.partials.header', ['title' => 'Креирај ресторан'])
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">Ресторан</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('restorants.index') }}" class="btn btn-sm btn-primary">Врати се назад</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <h6 class="heading-small text-muted mb-4">Информации за ресторанот</h6>
                        <div class="pl-lg-4">
                            <form method="post" action="{{ route('restorants.store') }}" autocomplete="off">
                                @csrf
                                <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="name">Име на ресторанот</label>
                                    <input type="text" name="name" id="name" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" oninvalid="this.setCustomValidity('Ве молиме внесете го името на ресторанот')"  oninput="setCustomValidity('')" placeholder="Внесете го тука името на ресторанот ..." value="" required autofocus>
                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                </div>
                                <hr />
                                <h6 class="heading-small text-muted mb-4">Информации за сопственикот</h6>
                                <div class="pl-lg-4">
                                    <div class="form-group{{ $errors->has('name_owner') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="name_owner">Име на сопственик</label>
                                        <input type="text" name="name_owner" id="name_owner" class="form-control form-control-alternative{{ $errors->has('name_owner') ? ' is-invalid' : '' }}" oninvalid="this.setCustomValidity('Ве молиме внесете го името на сопственикот')"  oninput="setCustomValidity('')"  placeholder="Внесете го тука името на сопственикот ..." value="" required autofocus>
                                        @if ($errors->has('name_owner'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('name_owner') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group{{ $errors->has('email_owner') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="email_owner">Е-маил на сопственик</label>
                                        <input type="email" name="email_owner" id="email_owner" class="form-control form-control-alternative{{ $errors->has('email_owner') ? ' is-invalid' : '' }}" oninvalid="this.setCustomValidity('Внесете е-маил кој содржи &quot@&quot. пример: info@gmail.mk')" oninput="setCustomValidity('')"  placeholder="Внесете го тука е-маилот на сопственикот ..." value="" required autofocus>
                                        @if ($errors->has('email_owner'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('email_owner') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group{{ $errors->has('phone_owner') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="phone_owner">Телефон на сопственик</label>
                                        <input type="text" name="phone_owner" id="phone_owner" class="form-control form-control-alternative{{ $errors->has('phone_owner') ? ' is-invalid' : '' }}" oninvalid="this.setCustomValidity('Ве молиме внесете телефон')"  oninput="setCustomValidity('')"  placeholder="Внесете го тука телефонот на сопственикот ..." value="" required autofocus>
                                        @if ($errors->has('phone_owner'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('phone_owner') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-success mt-4">Креирај</button>
                                    </div>
                                </form>
                            </div>
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.footers.auth')
    </div>
@endsection
