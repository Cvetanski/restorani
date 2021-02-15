<!-- Fee Info -->
<div class="col-5">
    <div class="card  bg-secondary shadow">
        <div class="card-header border-0">
            <div class="row align-items-center">
                <div class="col-8">
                    <h3 class="mb-0">Информации за процент</h3>
                </div>
                <div class="col-4 text-right">
                </div>
            </div>
        </div>
        <div class="card-body">
            <p>
                {{ __('Вашата Фиксна Давачка На Секоја Нарачка е: ')}}  @money( $restaurant->static_fee, env('CASHIER_CURRENCY','usd'),true)<br />
                {{ __('Вашиот Актуелен Процент На Секоја Нарачка е:  ').' '.$restaurant->fee."% ".__('на вредноста на нарачката')}} <br />
                <hr />
                <b>{{__('Давачки').": ".$restaurant->fee."% + "}} @money($restaurant->static_fee, env('CASHIER_CURRENCY','usd'),true)</b>
            </p>
        </div>
    </div>
</div>
