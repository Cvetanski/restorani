@extends('layouts.app', ['title' => __('Drivers')])

@section('content')
    <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
    </div>

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">Доставувачи</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('drivers.create') }}" class="btn btn-sm btn-primary">Креирај доставувач</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        @include('partials.flash')
                    </div>

                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">Име</th>
                                    <th scope="col">Е-маил</th>
                                    <th scope="col">Дата на креирање</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($drivers as $driver)
                                    <tr>
                                        <td><a href="{{ route('drivers.edit', $driver) }}">{{ $driver->name }}</a></td>
                                        <td>
                                            <a href="mailto:{{ $driver->email }}">{{ $driver->email }}</a>
                                        </td>
                                        <td>{{ $driver->created_at->format(env('DATETIME_DISPLAY_FORMAT','d M Y H:i')) }}</td>
                                        <td class="text-right">
                                            <div class="dropdown">
                                                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">

                                                        <form action="{{ route('drivers.destroy', $driver) }}" method="post">
                                                            @csrf
                                                            @method('delete')

                                                            <!--<a class="dropdown-item" href="{{ route('drivers.edit', $driver) }}">{{ __('Edit') }}</a>-->
                                                            <button type="button" class="dropdown-item" onclick="confirm('{{ __("Дали сте сигурни дека сакате да го деактивирате овој корисник?") }}') ? this.parentElement.submit() : ''">
                                                           Деактивирај
                                                            </button>
                                                        </form>

                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer py-4">
                        <nav class="d-flex justify-content-end" aria-label="...">
                            {{ $drivers->links() }}
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        @include('layouts.footers.auth')
    </div>
@endsection