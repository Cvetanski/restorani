@if(auth()->user()->hasRole('admin') || auth()->user()->hasRole('owner') || auth()->user()->hasRole('driver'))
    @role('admin')
    <script>
        function setSelectedOrderId(id){
            $("#form-assing-driver").attr("action", "updatestatus/assigned_to_driver/"+id);
        }
    </script>
    <td>
        @if($order->status->pluck('alias')->last() == "just_created")
            <a href="{{'updatestatus/accepted_by_admin/'.$order->id }}" class="btn btn-success btn-sm order-action">Прифатена</a>
            <a href="{{'updatestatus/rejected_by_admin/'.$order->id }}" class="btn btn-danger btn-sm order-action">Одбиена</a>
        @elseif($order->status->pluck('alias')->last() == "accepted_by_restaurant"&&$order->delivery_method.""!="2")
            <button type="button" class="btn btn-primary btn-sm order-action" onClick=(setSelectedOrderId({{ $order->id }}))  data-toggle="modal" data-target="#modal-asign-driver">Додели на доставувач</a>
        @elseif($order->status->pluck('alias')->last() == "prepared"&&$order->driver==null)
            <button type="button" class="btn btn-primary btn-sm order-action" onClick=(setSelectedOrderId({{ $order->id }}))  data-toggle="modal" data-target="#modal-asign-driver">Додели на доставувач</a>
        @else
            <small>Нема опции за промена во моментот!</small>
        @endif
    </td>
    @endrole
    @role('owner')
    <td>Нема опции за ажурирање</td>
{{--    <td>--}}
{{--        @if($order->status->pluck('alias')->last() == "accepted_by_admin")--}}
{{--            <a href="{{ url('updatestatus/accepted_by_restaurant/'.$order->id) }}" class="btn btn-success btn-sm order-action">Прифатена</a>--}}
{{--            <a href="{{ url('updatestatus/rejected_by_restaurant/'.$order->id) }}" class="btn btn-danger btn-sm order-action">Одбиена</a>--}}
{{--        @elseif($order->status->pluck('alias')->last() == "assigned_to_driver"||$order->status->pluck('alias')->last() == "accepted_by_restaurant")--}}
{{--            <a href="{{ url('updatestatus/prepared/'.$order->id) }}" class="btn btn-primary btn-sm order-action">Подготвена</a>--}}
{{--        @elseif(config('app.allow_self_deliver')&&$order->status->pluck('alias')->last() == "accepted_by_restaurant")--}}
{{--            <a href="{{ url('updatestatus/prepared/'.$order->id) }}" class="btn btn-primary btn-sm order-action">Подготвена</a>--}}
{{--        @elseif(config('app.allow_self_deliver')&&$order->status->pluck('alias')->last() == "prepared")--}}
{{--            <a href="{{ url('updatestatus/delivered/'.$order->id) }}" class="btn btn-primary btn-sm order-action">Испорачана</a>--}}
{{--        @elseif($order->status->pluck('alias')->last() == "prepared"&&$order->delivery_method.""=="2")--}}
{{--            <a href="{{ url('updatestatus/delivered/'.$order->id) }}" class="btn btn-primary btn-sm order-action">Испорачана</a>--}}
{{--        @else--}}
{{--            <small>Нема опции за промена во моментот!</small>--}}
{{--        @endif--}}
{{--    </td>--}}
    @endrole
    @role('driver')
    <td>
       @if($order->status->pluck('alias')->last() == "prepared")
            <a href="{{'updatestatus/picked_up/'.$order->id }}" class="btn btn-primary btn-sm order-action">Подигната</a>
        @elseif($order->status->pluck('alias')->last() == "picked_up")
            <a href="{{'updatestatus/delivered/'.$order->id }}" class="btn btn-primary btn-sm order-action">Испорачана</a>
        @else
            <small>Нема опции за промена во моментот!</small>
        @endif
    </td>
    @endrole
@endif
