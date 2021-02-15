{{--modal add to cart--}}

<div class="modal fade" id="productModal" z-index="9999" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-" role="document">
        <div class="modal-content" style="    border-radius: .0rem;">
            <div class="modal-header" style="border-bottom: 0px solid #e9ecef;">
                <h5 id="modalTitle" class="modal-title" id="modal-title-new-item"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span style="color: darkred" aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body p-0">
                <div class="card bg-secondary shadow border-0">
                    <div class="card-body px-lg-5 py-lg-5">
                    <!--<div class="container">-->
                        <div class="row">

{{--                            <div class="col-sm col-md col-lg col-lg text-center">--}}
{{--                                <img id="modalImg" src="" width="295px" height="200px">--}}
{{--                            </div>--}}
                            <div class="col-sm col-md col-lg col-lg">
                                <!--<h5><a href=""><span  id="modalName"></span></a></h5>-->
                                <p id="modalDescription"></p>
                                <div id="variants-area">
                                    <label class="form-control-label">{{ __('Select your options') }}</label>
                                    <div id="variants-area-inside">
                                    </div>
                                </div>
                                <input id="modalID" type="hidden" ></input>

                                <span id="modalPrice" class="new-price"></span>




                                <div id="exrtas-area">
                                    <br />
                                    <label class="form-control-label" for="quantity">Додатоци</label>
                                    <div id="exrtas-area-inside">
                                    </div>
                                </div>

                                @if(!config('app.isqrsaas'))
                                <div class="quantity-area my-5">

                                    <div class="form-group">
                                        <div class="row d-block d-lg-none" style="padding-top: 2%">
                                            <div id="addToCart1" class="d-inline p-2 text-white" style="padding-left: 0px !important; padding-right: 0px !important; ">
                                                    <button style="padding-left: 27px; padding-right: 27px;" class="btn btn-danger" v-on:click='addToCartAct'
                                                    <?php
                                                        if(auth()->user()){
                                                            if(auth()->user()->hasRole('client')) {echo "";} else {echo "disabled";}
                                                        }else if(auth()->guest()) {echo "";}
                                                        ?>
                                                    >Додади во <i class="fa fa-cart-plus"></i></button>
                                           </div>
                                            <div style="padding-left: 0px !important; padding-right: 0px !important;" class="d-inline p-2 text-white">
                                                <input  type='button' value='-' class='qtyminus btn btn-danger' field='quantity' />
                                            </div>
                                                <input name="quantity"  disabled id="quantity" class="d-inline p-2 text-white form-control" style=" padding-bottom: 10px !important;    background: #ed1c24; width: 20%;"  placeholder="{{ __('1') }}" value="1" required autofocus>
                                            <div class="d-inline p-2 text-white" style="padding-left: 0px !important; padding-right: 0px !important;">
                                                <input type='button' value='+'  class='qtyplus btn btn-danger' field='quantity' />
                                            </div>
                                        </div>

<div class="row my-0 d-none d-md-none d-lg-flex d-lx-block" style="padding-top: 2%">

    <div class="quantity-btn col-md-9 col-xs-9 col-sm-9 col-lg-9 " style="padding-left: 0px !important; padding-right: 0px !important;">
        <div id="addToCart2">
            <button class="btn btn-danger" style="color: #fff;
    background-color: #ed1c24;
    border-color: #ed1c24;
    box-shadow: 0 4px 6px rgba(50,50,93,.11), 0 1px 3px rgba(0,0,0,.08);     padding: 5px;    width: 100%;"  v-on:click='addToCartAct'
            <?php
                if(auth()->user()){
                    if(auth()->user()->hasRole('client')) {echo "";} else {echo "disabled";}
                }else if(auth()->guest()) {echo "";}
                ?>
            >Додади во кошница</button>
        </div>
    </div>
    <div class="col-md-1 col-xs-1 col-sm-1 col-lg-1" style="padding-left: 0px !important; padding-right: 0px !important;">
        <input  type='button' style="color: #fff;
    background-color: #ed1c24;
    border-color: #ed1c24;
    box-shadow: 0 4px 6px rgba(50,50,93,.11), 0 1px 3px rgba(0,0,0,.08);     padding: 5px;    width: 100%;" value='-' class='qtyminus btn btn-danger' field='quantity' />
    </div>
    <div class="col-md-1 col-xs-1 col-sm-1 col-lg-1" style="padding-left: 0px; padding-right: 0px !important;">
        <input name="quantity" style="color: #fff;
    background-color: #ed1c24;
    border-color: #ed1c24;
    box-shadow: 0 4px 6px rgba(50,50,93,.11), 0 1px 3px rgba(0,0,0,.08);     padding: 5px;    width: 100%;"  disabled id="quantity"  class="btn btn-danger"  placeholder="{{ __('1') }}" value="1" required autofocus>
    </div>
    <div class="col-md-1 col-xs-1 col-sm-1 col-lg-1" style="padding-left: 0px !important;padding-right: 0px !important;">
        <input type='button' style="color: #fff;
    background-color: #ed1c24;
    border-color: #ed1c24;
    box-shadow: 0 4px 6px rgba(50,50,93,.11), 0 1px 3px rgba(0,0,0,.08);     padding: 5px;    width: 100%;" value='+'  class='qtyplus btn btn-danger' field='quantity' />
    </div>
</div>


{{--                                        ///--}}
                                    </div>

                                </div>
                                @endif


                            </div>
                        </div>
                    <!--</div>-->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{--end modal add to cart--}}
<div class="modal fade" id="modal-import-restaurants" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
    <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="modal-title-new-item">Импортирај ресторани од CSV</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body p-0">
                <div class="card bg-secondary shadow border-0">
                    <div class="card-body px-lg-5 py-lg-5">
                        <div class="col-md-10 offset-md-1">
                        <form role="form" method="post" action="{{ route('import.restaurants') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group text-center{{ $errors->has('item_image') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="resto_excel">Прикачи документ</label>
                                <div class="text-center">
                                    <input type="file" class="form-control form-control-file" name="resto_excel" accept=".csv, .ods, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel" required>
                                </div>
                            </div>
                            <input name="category_id" id="category_id" type="hidden" required>
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
</div>
@isset($restorant)
<div class="modal fade" id="modal-restaurant-info" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
    <div class="modal-dialog modal- modal-dialog-centered modal-lg" role="document" >
        <div class="modal-content">
            <!--<div class="modal-header">
                <img class="bg-image" loading="lazy" src="{{ $restorant->coverm }}" style="width: 100%;">
            </div>-->
            <div class="modal-body p-0">
                <!--<div class="card" style="margin: -350px 20px 0 20px">-->
                <div class="card">
                    <div class="card-header bg-white text-center">
                        <img class="rounded" src="{{ $restorant->icon }}" width="90px" height="90px"></img>
                        <h4 class="heading mt-4">{{ $restorant->name }} &nbsp;@if(count($restorant->ratings))<span><i class="fa fa-star" style="color: #dc3545"></i> <strong>{{ number_format($restorant->averageRating, 1, '.', ',') }} <span class="small">/ 5 ({{ count($restorant->ratings) }})</strong></span></span>@endif</h4>
                        <p class="description">{{ $restorant->description }}</p>
                        @if(!empty($openingTime) && !empty($closingTime))
                            <p class="description">{{ __('Open') }}: {{ $openingTime }} - {{ $closingTime }}</p>
                        @endif
                    </div>
                    <div class="card-body">
                        <div class="nav-wrapper">
                            <ul class="nav nav-pills nav-fill flex-column flex-md-row" id="tabs-icons-text" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link mb-sm-3 mb-md-0 active" id="tabs-icons-text-1-tab" data-toggle="tab" href="#tabs-icons-text-1" role="tab" aria-controls="tabs-icons-text-1" aria-selected="true">{{ __('About') }}</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-2-tab" data-toggle="tab" href="#tabs-icons-text-2" role="tab" aria-controls="tabs-icons-text-2" aria-selected="false">{{ __('Reviews') }}</a>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="tabs-icons-text-1" role="tabpanel" aria-labelledby="tabs-icons-text-1-tab">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h6 class="heading-small">{{ __('Phone') }}</h6>
                                        <p class="heading-small text-muted">{{ $restorant->phone }}</p>
                                        <br/>
                                        <h6 class="heading-small">{{ __('Address') }}</h6>
                                        <p class="heading-small text-muted">{{ $restorant->address }}</p>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div id="map3" class="form-control form-control-alternative"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="tabs-icons-text-2" role="tabpanel" aria-labelledby="tabs-icons-text-2-tab">
                                @if(count($restorant->ratings) != 0)
                                    <br/>
                                    <h5>{{ count($restorant->ratings) }} {{ count($restorant->ratings) == 1 ? __('Review') : __('Reviews')}}</h5>
                                    <hr />
                                    @foreach($restorant->ratings as $rating)
                                        <div class="strip">
                                            <span class="res_title"><b>{{ $usernames[$rating->user_id]->name }}</b></span><span class="float-right"><i class="fa fa-star" style="color: #dc3545"></i> <strong>{{ number_format($rating->rating, 1, '.', ',') }} <span class="small">/ 5</strong></span></span><br />
                                            <span class="text-muted"> {{ $rating->created_at->format(env('DATETIME_DISPLAY_FORMAT','d M Y')) }}</span><br/>
                                            <br/>
                                            <span class="res_description text-muted">{{ $rating->comment }}</span><br />
                                        </div>
                                    @endforeach
                                @else
                                  <p>{{ __('There are no reviews yet.') }}<p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endisset

