@extends('general.index', $setup);
@section('thead')
    <th>Рејтинг</th>
    <th>Коментар</th>
    <th>Нарачка</th>
    <th>Корисник</th>
    <th>Дејствија</th>
@endsection
@section('tbody')
@foreach ($setup['items'] as $item)
<tr>
    <td>{{ $item->rating }}</td>
    <td>{{ $item->comment }}</td>
<td><a href="{{ route('orders.show',['order'=>$item->order->id]) }}">{{ "#".$item->order->id }}</a></td>
    <td>{{ $item->user->name }}</td>
    <td><a href="{{ route("reviews.destroyget",["rating"=>$item->id]) }}" class="btn btn-danger btn-sm">Отстрани</a></td>
</tr>
@endforeach

@endsection
