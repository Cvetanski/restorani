<thead class="thead-light">
    <tr>
        <th scope="col">ИД</th>
        @hasrole('admin|driver')
            <th scope="col">Ресторан</th>
        @endhasrole
        <th class="table-web" scope="col">Креиран</th>
        <th class="table-web" scope="col">Метод</th>

        <th class="table-web" scope="col">Процент на платформа</th>
        <th class="table-web" scope="col">{{ __('Processor fee') }}</th>
        <th class="table-web" scope="col">Испорака</th>
        <th class="table-web" scope="col">Нето цена + ДДВ</th>
        <th class="table-web" scope="col">ДДВ</th>
        <th class="table-web" scope="col">Нето</th>


        <th class="table-web" scope="col">Вкупно</th>

    </tr>
</thead>
<tbody>
@foreach($orders as $order)
<tr>
    <td>
        <!--<span class="text-primary order_id" name="order-id" style="cursor:pointer" value='{{ $order->id }}' data-toggle="modal" data-target="#modal-order-details">{{ $order->id }}</span>-->
        <a class="btn badge badge-success badge-pill" href="{{ route('orders.show',$order->id )}}">#{{ $order->id }}</a>
    </td>
    @hasrole('admin|driver')
    <th scope="row">
        <div class="media align-items-center">
            <a class="avatar-custom mr-3">
                <img class="rounded" alt="..." src={{ $order->restorant->icon }}>
            </a>
            <div class="media-body">
                <span class="mb-0 text-sm">{{ $order->restorant->name }}</span>
            </div>
        </div>
    </th>
    @endhasrole

    <td class="table-web">
        {{ $order->created_at->format(env('DATETIME_DISPLAY_FORMAT','d M Y H:i')) }}
    </td>
    <td class="table-web">
        @if ($order->delivery_method==1)
            <span class="badge badge-primary badge-pill">{{ __('Delivery') }} | {{ __($order->payment_method) }} </span>
        @else
            <span class="badge badge-success badge-pill">{{ __('Pickup') }} | {{ __($order->payment_method) }}</span>
        @endif

    </td>

    <td class="table-web">
        @money( $order->fee_value+$order->static_fee, env('CASHIER_CURRENCY','usd'),true)
    </td>
    <td class="table-web">
        @money( $order->payment_processor_fee, env('CASHIER_CURRENCY','usd'),true)
    </td>
    <td class="table-web">
        @money( $order->delivery_price, env('CASHIER_CURRENCY','usd'),true)
    </td>
    <td class="table-web">
        @money( $order->order_price-($order->fee_value+$order->static_fee), env('CASHIER_CURRENCY','usd'),true)
    </td>
    <td class="table-web">
        @money( $order->vatvalue, env('CASHIER_CURRENCY','usd'),true)
    </td>
    <td class="table-web">
        @money( $order->order_price-($order->fee_value+$order->static_fee)-$order->vatvalue, env('CASHIER_CURRENCY','usd'),true)
    </td>



    <td class="table-web">
        @money( $order->order_price+$order->delivery_price, env('CASHIER_CURRENCY','usd'),true)
    </td>


</tr>


@endforeach
</tbody>
