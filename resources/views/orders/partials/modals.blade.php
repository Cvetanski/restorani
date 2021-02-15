<div class="modal fade modal-xl" id="modal-order-details" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
    <div class="modal-dialog modal-l modal-dialog-centered" style="max-width:1140px" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title" id="modal-title-order"></h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-7">
                        <h3 id="restorant-name"><h3>
                        <p id="restorant-address"></p>
                        <p id="restorant-info"></p>
                        <h4 id="client-name"><h4>
                        <p id="client-info"></p>
                        <h4>Order</h4>
                        <p>
                            <ol id="order-items">
                            </ol>
                        </p>
                        <h4 id="delivery-price"><h4>
                        <h4>Total<h4>
                        <p id="total-price"></p>
                    </div>
                    <div class="col-md-5">
                        @if(auth()->user()->hasRole('admin') || auth()->user()->hasRole('owner') || auth()->user()->hasRole('client'))
                        <div class="card">
                            <!-- Card header -->
                            <div class="card-header">
                            <!-- Title -->
                                <h5 class="h3 mb-0">{{ __("Status History")}}</h5>
                            </div>
                            <!-- Card body -->
                            <div class="card-body">
                                <div class="timeline timeline-one-side" id="status-history" style="height: 240px; overflow-y: scroll" data-timeline-content="axis" data-timeline-axis-style="dashed">
                                <!--<div class="timeline-block">
                                    <span class="timeline-step badge-success">
                                        <i class="ni ni-bell-55"></i>
                                    </span>
                                    <div class="timeline-content">
                                        <div class="d-flex justify-content-between pt-1">
                                            <div>
                                                <span class="text-muted text-sm font-weight-bold">Order received</span>
                                            </div>
                                            <div class="text-right">
                                                <small class="text-muted"><i class="fas fa-clock mr-1"></i>2 hrs ago</small>
                                            </div>
                                        </div>
                                        <h6 class="text-sm mt-1 mb-0">Client CLIENT_NAME makes the order</h6>
                                    </div>
                                </div>-->
                            </div>
                        </div>
                        @endif
                        @if(auth()->user()->hasRole('driver'))
                        <div class="card card-status-history-driver">
                            <!-- Card header -->
                            <div class="card-header">
                            <!-- Title -->
                                <h5 class="h3 mb-0">{{ __("Status History")}}</h5>
                            </div>
                            <!-- Card body -->
                            <div class="card-body">
                                <div class="timeline timeline-one-side" id="status-history" style="height: 240px; overflow-y: scroll;" data-timeline-content="axis" data-timeline-axis-style="dashed">
                                <!--<div class="timeline-block">
                                    <span class="timeline-step badge-success">
                                        <i class="ni ni-bell-55"></i>
                                    </span>
                                    <div class="timeline-content">
                                        <div class="d-flex justify-content-between pt-1">
                                            <div>
                                                <span class="text-muted text-sm font-weight-bold">Order received</span>
                                            </div>
                                            <div class="text-right">
                                                <small class="text-muted"><i class="fas fa-clock mr-1"></i>2 hrs ago</small>
                                            </div>
                                        </div>
                                        <h6 class="text-sm mt-1 mb-0">Client CLIENT_NAME makes the order</h6>
                                    </div>
                                </div>-->
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>

</div>
<div class="modal fade" id="modal-asign-driver" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
    <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="modal-title-new-item">Додели доставувач на нарачката</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body p-0">
                <div class="card bg-secondary shadow border-0">
                    <div class="card-body px-lg-5 py-lg-5">
                        <form id="form-assing-driver" method="GET" action="">
                            <div class="form-group{{ $errors->has('driver') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="driver">Додели</label>
                                <select class="form-control select2" name="driver" id="assign-driver-select">
                                    <option disabled selected value> -- Одбери доставувач -- </option>
                                    @foreach ($drivers as $driver)
                                        <option value="{{ $driver->id }}">{{$driver->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary my-4">Зачувај</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modal-rate-restaurant" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
    <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="modal-title-new-item">{{ __('Your overall rating') }}</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body p-0">
                <div class="card bg-secondary shadow border-0">
                    <div class="card-body px-lg-5 py-lg-5">
                        <form role="form" method="post" action="{{ route('rate.order', isset($order)?$order:"") }}">
                        @csrf
                        <!--<input type="hidden" id="order_id" />-->
                        <input type="hidden" id="rating_value" name="ratingValue">
                        <section class='rating-widget'>
                        <!-- Rating Stars Box -->
                        <div class='rating-stars text-center'>
                            <ul id='stars'>
                            <li class='star' title='Poor' data-value='1'>
                                <i class='fa fa-star fa-fw'></i>
                            </li>
                            <li class='star' title='Fair' data-value='2'>
                                <i class='fa fa-star fa-fw'></i>
                            </li>
                            <li class='star' title='Good' data-value='3'>
                                <i class='fa fa-star fa-fw'></i>
                            </li>
                            <li class='star' title='Excellent' data-value='4'>
                                <i class='fa fa-star fa-fw'></i>
                            </li>
                            <li class='star' title='WOW!!!' data-value='5'>
                                <i class='fa fa-star fa-fw'></i>
                            </li>
                            </ul>
                        </div>
                        <div class='success-box' id="success-box-ratings">
                            <div class='clearfix'></div>
                            <img alt='tick image' width='32' src='data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pgo8IS0tIEdlbmVyYXRvcjogQWRvYmUgSWxsdXN0cmF0b3IgMTkuMC4wLCBTVkcgRXhwb3J0IFBsdWctSW4gLiBTVkcgVmVyc2lvbjogNi4wMCBCdWlsZCAwKSAgLS0+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgdmVyc2lvbj0iMS4xIiBpZD0iTGF5ZXJfMSIgeD0iMHB4IiB5PSIwcHgiIHZpZXdCb3g9IjAgMCA0MjYuNjY3IDQyNi42NjciIHN0eWxlPSJlbmFibGUtYmFja2dyb3VuZDpuZXcgMCAwIDQyNi42NjcgNDI2LjY2NzsiIHhtbDpzcGFjZT0icHJlc2VydmUiIHdpZHRoPSI1MTJweCIgaGVpZ2h0PSI1MTJweCI+CjxwYXRoIHN0eWxlPSJmaWxsOiM2QUMyNTk7IiBkPSJNMjEzLjMzMywwQzk1LjUxOCwwLDAsOTUuNTE0LDAsMjEzLjMzM3M5NS41MTgsMjEzLjMzMywyMTMuMzMzLDIxMy4zMzMgIGMxMTcuODI4LDAsMjEzLjMzMy05NS41MTQsMjEzLjMzMy0yMTMuMzMzUzMzMS4xNTcsMCwyMTMuMzMzLDB6IE0xNzQuMTk5LDMyMi45MThsLTkzLjkzNS05My45MzFsMzEuMzA5LTMxLjMwOWw2Mi42MjYsNjIuNjIyICBsMTQwLjg5NC0xNDAuODk4bDMxLjMwOSwzMS4zMDlMMTc0LjE5OSwzMjIuOTE4eiIvPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8L3N2Zz4K'/>
                            <div class='text-message'></div>
                            <div class='clearfix'></div>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary my-4" id="save-ratings">{{ __('Save') }}</button>
                        </div>
                        </section>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modal-time-to-prepare" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
    <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="modal-title-new-item">Одберете време на подготовка за нарачката</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body p-0">
                <div class="card bg-secondary shadow border-0">
                    <div class="card-body px-lg-5 py-lg-5">
                    <form role="form" method="GET" id="form-time-to-prepare" action="{{ route('update.status', ['accepted_by_restaurant',isset($order)?$order:""]) }}">
                        <div class="form-group text-center">
                            <!--<label class="form-control-label" for="client">{{ __('Filter by Client') }}</label>-->
                            <!--<select class="form-control select2" id="time_to_prepare_select" name="time_to_prepare" required>
                                @for ($i=5; $i<=150; $i+=5)
                                    <option value="{{ $i }}">{{ $i ." ".__('minutes')}}</option>
                                @endfor
                            </select>-->
                            <input type="hidden" name="time_to_prepare" id="time_to_prepare"/>
                            @for($i=20; $i<=40; $i+=10)
                                <button type="button" value="{{ $i }}" class="btn btn-outline-primary btn-time-to-prepare">{{ $i }}</button>
                            @endfor
                        </div>
                        <div class="text-center">
                            <button type="submit" id="btn-submit-time-prepare" class="btn btn-primary my-4" id="save-ratings">Зачувај</button>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

