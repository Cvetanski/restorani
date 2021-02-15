@extends('general.index', $setup);
@section('cardbody')
<form action="{{ $setup['action'] }}" method="POST" enctype="multipart/form-data">
        @csrf
        @isset($setup['isupdate'])
            @method('PUT')
        @endisset
        @include('partials.fields',['fiedls'=>$fields])
        @if (isset($setup['isupdate']))
            <button type="submit" class="btn btn-primary">Aжурираj</button>
        @else
            <button type="submit" class="btn btn-primary">Додади</button>
        @endif
    </form>
@endsection
