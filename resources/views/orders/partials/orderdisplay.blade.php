<thead class="thead-light">
    <tr>
        <th scope="col">ИД - Код</th>
        @hasrole('admin|driver')
            <th scope="col">Ресторан</th>
        @endhasrole
        <th class="table-web" scope="col">Датум на креирање</th>
        <th class="table-web" scope="col">Време</th>
        @if(auth()->user()->hasRole('admin') )
        <th class="table-web" scope="col">Метод</th>
        @endif
        <th scope="col">Последен статус</th>
        @hasrole('admin|')
            <th class="table-web" scope="col">Клиент</th>
        @endhasrole
        @role('admin')
            <th class="table-web" scope="col">Адреси</th>
        @endrole
        @role('owner')
            <th class="table-web" scope="col">Ставки</th>
        @endrole
        @hasrole('admin')
            <th class="table-web" scope="col">Добавувачи</th>
        @endhasrole
        <th class="table-web" scope="col">Избриши Нарачка</th>

        <th class="table-web" scope="col">Измени Нарачка</th>
        @if(auth()->user()->hasRole('admin') )
        <th class="table-web" scope="col">Цена</th>

        <th class="table-web" scope="col">Испорака</th>
        @endif
        @if(auth()->user()->hasRole('admin') || auth()->user()->hasRole('owner') || auth()->user()->hasRole('driver'))
            <th scope="col">Подесувања</th>
        @endif
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
        {{ $order->created_at->format(env('DATETIME_DISPLAY_FORMAT','d m Y H:i')) }}
    </td>
    <td class="table-web">
        {{ $order->time_formated }}
    </td>
    @if(auth()->user()->hasRole('admin') )
    <td class="table-web">
        @if ($order->delivery_method==1)
            <span class="badge badge-primary badge-pill">со достава</span>
        @else
            <span class="badge badge-success badge-pill">подигни сам</span>
        @endif

    </td>
    @endif
    <td>
        @if($order->status->pluck('id')->last() == "1")
            <span class="badge badge-primary badge-pill">{{ __($order->status->pluck('name')->last()) }}</span>
        @elseif($order->status->pluck('id')->last() == "2" || $order->status->pluck('id')->last() == "3")
            <span class="badge badge-success badge-pill">{{ __($order->status->pluck('name')->last()) }}</span>
        @elseif($order->status->pluck('id')->last() == "4")
            <span class="badge badge-default badge-pill">{{ __($order->status->pluck('name')->last()) }}</span>
        @elseif($order->status->pluck('id')->last() == "5")
            <span class="badge badge-warning badge-pill">{{ __($order->status->pluck('name')->last()) }}</span>
        @elseif($order->status->pluck('id')->last() == "6")
            <span class="badge badge-success badge-pill">{{ __($order->status->pluck('name')->last()) }}</span>
        @elseif($order->status->pluck('id')->last() == "7")
            <span class="badge badge-info badge-pill">{{ __($order->status->pluck('name')->last()) }}</span>
        @elseif($order->status->pluck('id')->last() == "8" || $order->status->pluck('id')->last() == "9")
            <span class="badge badge-danger badge-pill">{{ __($order->status->pluck('name')->last()) }}</span>
        @endif
    </td>
    @hasrole('admin|owner|driver')
    @if(auth()->user()->hasRole('admin') )
    <td class="table-web">
       {{ $order->client->name }}
    </td>
    @endif
    @endhasrole
    @role('admin')
        <td class="table-web">
            {{ $order->address?$order->address->address:"" }}
        </td>
    @endrole
    @role('owner')
        <td class="table-web">
            {{ count($order->items) }}
        </td>
    @endrole
    @hasrole('admin')
        <td class="table-web">
{{--            {{ !empty($order->driver->name) ? $order->driver->name : "" }}--}}
        </td>
    @endhasrole
    @if(auth()->user()->hasRole('admin') )
    <td class="table-web">

{{--        <a class="btn btn-danger" href="{{asset('delete-orders', $order->id)}}">Избриши Нарачка</a>--}}

        <form method="POST" action="{{ route('delete-orders', $order->id) }}">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}
            <button class="btn btn-danger" type="submit">Избришете Нарачка</button>
        </form>

{{--        @money( $order->order_price, env('CASHIER_CURRENCY','usd'),true)--}}
    </td>
    <td class="table-web">

        <form method="GET" action="{{ route('order-edit', $order->id) }}">
            {{ csrf_field() }}
{{--            {{ method_field('EDIT') }}--}}
            <button class="btn btn-danger" type="submit">Измени Нарачка</button>
        </form>
{{--        @money( $order->delivery_price, env('CASHIER_CURRENCY','usd'),true)--}}
    </td>
    <td class="table-web">
    </td>
    @endif
    @include('orders.partials.actions.table',['order' => $order ])
</tr>
@endforeach
</tbody>
