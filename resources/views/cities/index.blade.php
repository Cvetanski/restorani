@extends('general.index', $setup);
@section('thead')
    <th>Име</th>
    <th>Кратко Име</th>
    <th>Опции</th>
@endsection
@section('tbody')
@foreach ($setup['items'] as $item)
<tr>
    <td>{{ $item->name }}</td>
    <td>{{ $item->alias }}</td>
    <td><a href="{{ route("cities.edit",["city"=>$item->id]) }}" class="btn btn-primary btn-sm">Промени</a><a href="{{ route("cities.delete",["city"=>$item->id]) }}" class="btn btn-danger btn-sm">Избриши</a></td>
</tr>
@endforeach

@endsection
