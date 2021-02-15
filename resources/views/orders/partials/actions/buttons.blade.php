@if(auth()->user()->hasRole('admin') || auth()->user()->hasRole('owner') || auth()->user()->hasRole('driver'))
<div class="card-footer py-4">
    <h6 class="heading-small text-muted mb-4">Опции</h6   >
    <nav class="justify-content-end" aria-label="...">
    @role('admin')
        <script>
            function setSelectedOrderId(id){
                $("#form-assing-driver").attr("action", "/updatestatus/assigned_to_driver/"+id);
            }
        </script>
        @if($order->status->pluck('alias')->last() == "just_created")
            <a href="{{ url('updatestatus/accepted_by_admin/'.$order->id) }}" class="btn btn-primary">Прифатена</a>
            <a href="{{ url('updatestatus/rejected_by_admin/'.$order->id) }}" class="btn btn-danger">Одбиена</a>
        @elseif($order->status->pluck('alias')->last() == "accepted_by_restaurant"&&$order->delivery_method.""!="2")
            <button type="button" class="btn btn-primary" onClick=(setSelectedOrderId({{ $order->id }}))  data-toggle="modal" data-target="#modal-asign-driver"> Додели на возач </button>
        @elseif($order->status->pluck('alias')->last() == "prepared"&&$order->delivery_method.""!="2"&&$order->driver==null)
            <button type="button" class="btn btn-primary" onClick=(setSelectedOrderId({{ $order->id }}))  data-toggle="modal" data-target="#modal-asign-driver">Додели на  </button>
        @else
            <p>Не постојат опции за ажурирање во моментов!</p>
       @endif

        @if($order->status->pluck('alias')->last() == "accepted_by_admin")
{{--            <a href="{{ url('updatestatus/accepted_by_restaurant/'.$order->id) }}" class="btn btn-primary">{{ __('Accept') }}</a>--}}
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-time-to-prepare">Прифатена</button>
            <a href="{{ url('updatestatus/rejected_by_restaurant/'.$order->id) }}" class="btn btn-danger">Одбиена</a>
        @elseif($order->status->pluck('alias')->last() == "assigned_to_driver"||$order->status->pluck('alias')->last() == "прифатена од ресторанот")
            <a href="{{ url('updatestatus/prepared/'.$order->id) }}" class="btn btn-primary">Подготвена</a>
        @elseif(config('app.allow_self_deliver')&&$order->status->pluck('alias')->last() == "прифатена од ресторанот")
            <a href="{{ url('updatestatus/prepared/'.$order->id) }}" class="btn btn-primary">Подготвена</a>
        @elseif(config('app.allow_self_deliver')&&$order->status->pluck('alias')->last() == "prepared")
            <a href="{{ url('updatestatus/delivered/'.$order->id) }}" class="btn btn-primary">Испорачана</a>
        @elseif($order->status->pluck('alias')->last() == "prepared"&&$order->delivery_method.""=="2")
            <a href="{{ url('updatestatus/delivered/'.$order->id) }}" class="btn btn-primary">Испорачана</a>
        @else
            <p>Не постојат опции за ажурирање во моментов!</p>
        @endif
    @endrole
    @role('owner')
        @if($order->status->pluck('alias')->last() == "accepted_by_admin")
            <a href="{{ url('updatestatus/accepted_by_restaurant/'.$order->id) }}" class="btn btn-primary">{{ __('Accept') }}</a>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-time-to-prepare">Прифатена</button>
            <a href="{{ url('updatestatus/rejected_by_restaurant/'.$order->id) }}" class="btn btn-danger">Одбиена</a>
        @elseif($order->status->pluck('alias')->last() == "assigned_to_driver"||$order->status->pluck('alias')->last() == "прифатена од ресторанот")
            <a href="{{ url('updatestatus/prepared/'.$order->id) }}" class="btn btn-primary">Подготвена</a>
        @elseif(config('app.allow_self_deliver')&&$order->status->pluck('alias')->last() == "прифатена од ресторанот")
            <a href="{{ url('updatestatus/prepared/'.$order->id) }}" class="btn btn-primary">Подготвена</a>
        @elseif(config('app.allow_self_deliver')&&$order->status->pluck('alias')->last() == "prepared")
            <a href="{{ url('updatestatus/delivered/'.$order->id) }}" class="btn btn-primary">Испорачана</a>
        @elseif($order->status->pluck('alias')->last() == "prepared"&&$order->delivery_method.""=="2")
            <a href="{{ url('updatestatus/delivered/'.$order->id) }}" class="btn btn-primary">Испорачана</a>
        @else
            <p>Не постојат опции за ажурирање во моментов!</p>
        @endif
    @endrole
    @role('driver')
        @if($order->status->pluck('alias')->last() == "prepared")
            <a href="{{ url('updatestatus/picked_up/'.$order->id) }}" class="btn btn-primary">Подигната</a>
        @elseif($order->status->pluck('alias')->last() == "picked_up")
            <a href="{{ url('updatestatus/delivered/'.$order->id) }}" class="btn btn-primary">Испорачана</a>
        @else
            <p>{{ __('No actions for you right now!') }}</p>
        @endif
    @endrole
    </nav>
</div>
@endif
