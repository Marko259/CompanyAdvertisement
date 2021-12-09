@extends('layouts.app')

@section('title', 'Reklame indstillinger')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap4.min.css') }}">
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">Reklame indstillinger</h1>
                    <a href="{{ route('advert.create') }}"
                        class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                            class="fas fa-plus fa-sm text-white-50"></i> Opret Ny Reklame</a>
                </div>
            </div>
        </div>

        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Alle roller</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Reklame titel</th>
                                <th>Filter</th>
                                <th>Ejer</th>
                                <th width="480px">Handlinger</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Reklame titel</th>
                                <th>Filter</th>
                                <th>Ejer</th>
                                <th>Handlinger</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($adverts as $advert)
                                <tr>
                                    <td>{{ $advert->title }}</td>
                                    <td>
                                        @foreach ($advert->filters()->get() as $filter)
                                            <span class="badge badge-info">{{ $filter->name }}</span>
                                        @endforeach
                                    </td>
                                    <td>{{ $advert->user()->first()->name }}</td>
                                    <td>
                                        <a href="{{ route('advert.show', $advert->id) }}"
                                            class="btn btn-info btn-circle"><i class="fas fa-eye"></i></a>
                                        <a href="{{ route('advert.edit', $advert->id) }}"
                                            class="btn btn-primary btn-circle">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('advert.destroy', $advert->id) }}" method="post"
                                            style="display: inline"
                                            onsubmit="return confirm('Er du sikker på at du vil slette denne bruger?')">
                                            @method('DELETE')
                                            @csrf
                                            <button class="btn btn-danger btn-circle" type="submit">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('js/demo/datatables-demo.js') }}"></script>
    <script>
        $(document).ready(function() {
            $("#actions").addClass("active");
            $('#advert').addClass('active');
        });
    </script>
@endsection
