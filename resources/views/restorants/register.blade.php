@extends('layouts.front', ['title' => __('User Profile')])

@section('content')
    @include('users.partials.header', [
        'title' => __(''),
    ])


    <div class="container-fluid mt--7">
        <div class="row">

            </div>
            <div class="col-xl-8 offset-xl-2">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <h3 class="col-12 mb-0">Регистрирајте го вашиот ресторан</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <form  id="registerform" method="post" action="{{ route('newrestaurant.store') }}" autocomplete="off">
                            @csrf
                            <h6 class="heading-small text-muted mb-4">Информации за вашиот ресторан</h6>

                            @if (session('status'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('status') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                            <div class="pl-lg-4">
                                <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="name">Име на ресторан</label>
                                    <input type="text" name="name" id="name" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" oninvalid="this.setCustomValidity('Ве молиме внесете го името на ресторанот')"  oninput="setCustomValidity('')" placeholder="Внесете го името на ресторанот ..." value="{{ isset($_GET["name"])?$_GET['name']:""}}" required autofocus>
                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <hr class="my-4" />
                            <h6 class="heading-small text-muted mb-4">Информации за сопственикот на ресторанот</h6>
                            <div class="pl-lg-4">
                                <div class="form-group{{ $errors->has('name_owner') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="name_owner">Име на сопственик</label>
                                    <input type="text" name="name_owner" id="name_owner" class="form-control form-control-alternative{{ $errors->has('name_owner') ? ' is-invalid' : '' }}" oninvalid="this.setCustomValidity('Ве молиме внесете го името на сопственикот')"  oninput="setCustomValidity('')" placeholder="Внесете го името на сопственикот ..." value="{{ isset($_GET["name"])?$_GET['name']:""}}" required autofocus>

                                    @if ($errors->has('name_owner'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('name_owner') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('email_owner') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="email_owner">Е-маил на сопственик</label>
                                    <input type="email" name="email_owner" id="email_owner" class="form-control form-control-alternative{{ $errors->has('email_owner') ? ' is-invalid' : '' }}"  oninvalid="this.setCustomValidity('Внесете е-маил кој содржи &quot@&quot. пример: info@roshni.mk')" placeholder="Внесете го Е-маилот на сопственикот ..." value="{{ isset($_GET["email"])?$_GET['email']:""}}"  autofocus>

                                    @if ($errors->has('email_owner'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email_owner') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('phone_owner') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="phone_owner">Телефон на сопственик</label>
                                    <input type="text" name="phone_owner" id="phone_owner" class="form-control form-control-alternative{{ $errors->has('phone_owner') ? ' is-invalid' : '' }}" oninvalid="this.setCustomValidity('Ве молиме внесете го телефонот на сопственикот')"  oninput="setCustomValidity('')" placeholder="Внесете го телефонот на сопственикот(+389 07X XXX XXX) ..." value="{{ isset($_GET["phone"])?$_GET['phone']:""}}" required autofocus>

                                    @if ($errors->has('phone_owner'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('phone_owner') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-success mt-4">Испрати барање</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <br/>
    </div>
@endsection

@section('js')
@if (isset($_GET['name'])&&$errors->isEmpty())
<script>
    document.getElementById("registerform").submit();
</script>
@endif
@endsection
