<div class="card shadow">
    <div class="card-header border-0">
        @if(count($orders))
        <form method="GET">
            <div class="row align-items-center">
                <div class="col-8">
                    <h3 class="mb-0">Нарачки</h3>
                </div>
                <div class="col-4 text-right">
                    <button id="show-hide-filters" class="btn btn-icon btn-1 btn-sm btn-outline-secondary" type="button">
                        <span class="btn-inner--icon"><i id="button-filters" class="ni ni-bold-down"></i></span>
                    </button>
                </div>
            </div>
            <br/>
            <div class="tab-content orders-filters">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="input-daterange datepicker row align-items-center">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-control-label">Филтрирај по датум од </label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                                            </div>
                                            <input name="fromDate" class="form-control" placeholder="Датум од" type="text" <?php if(isset($_GET['fromDate'])){echo 'value="'.$_GET['fromDate'].'"';} ?> >
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-control-label">До</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                                            </div>
                                            <input name="toDate" class="form-control" placeholder="Датум до" type="text"  <?php if(isset($_GET['toDate'])){echo 'value="'.$_GET['toDate'].'"';} ?>>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @hasrole('admin|driver')
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="form-control-label" for="restorant">Филтрирај по ресторан</label>
                                    <select class="form-control select2" name="restorant_id">
                                        <option disabled selected value> -- Одберете опција -- </option>
                                        @foreach ($restorants as $restorant)
                                            <option <?php if(isset($_GET['restorant_id'])&&$_GET['restorant_id'].""==$restorant->id.""){echo "selected";} ?> value="{{ $restorant->id }}">{{$restorant->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        @endhasrole
                        @hasrole('admin|owner')
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="form-control-label" for="client">Филтрирај по клиент</label>

                                <select class="form-control select2" id="blabla" name="client_id">
                                    <option disabled selected value> -- Одберете опција -- </option>
                                    @foreach ($clients as $client)
                                        <option  <?php if(isset($_GET['client_id'])&&$_GET['client_id'].""==$client->id.""){echo "selected";} ?>  value="{{ $client->id }}">{{$client->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        @endhasrole
                        @hasrole('admin|owner')
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="form-control-label" for="driver">Филтрирај по добавувач</label>
                                <select class="form-control select2" name="driver_id">
                                    <option disabled selected value> -- Одберете опција -- </option>
                                    @foreach ($drivers as $driver)
                                        <option <?php if(isset($_GET['driver_id'])&&$_GET['driver_id'].""==$driver->id.""){echo "selected";} ?>   value="{{ $driver->id }}">{{$driver->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        @endhasrole
                    </div>

                        <div class="col-md-6 offset-md-6">
                            <div class="row">
                                @if ($parameters)
                                    <div class="col-md-4">
                                        <a href="{{ Request::url() }}" class="btn btn-md btn-block">{{ __('Clear Filters') }}</a>
                                    </div>
                                    <div class="col-md-4">
                                    <a href="{{Request::fullUrl()."&report=true" }}" class="btn btn-md btn-success btn-block">{{ __('Download report') }}</a>
                                    </div>
                                @else
                                    <div class="col-md-8"></div>
                                @endif

                                <div class="col-md-4">
                                    <button type="submit" class="btn btn-primary btn-md btn-block">Филтер</button>
                                </div>
                        </div>
                    </div>
             </div>
        </form>
        @endif
    </div>
    <div class="col-12">
        @include('partials.flash')
    </div>
    @if(count($orders))
    <div class="table-responsive">
        <table class="table align-items-center">
            @if (isset($financialReport))
                @include('finances.financialdisplay')
            @else
                @include('orders.partials.orderdisplay')
            @endif
        </table>
    </div>
    @endif
    <div class="card-footer py-4">
        @if(count($orders))
        <nav class="d-flex justify-content-end" aria-label="...">
            {{ $orders->appends(Request::all())->links() }}
        </nav>
        @else
            <h4>Немате нарачки ...</h4>
        @endif
    </div>
</div>
