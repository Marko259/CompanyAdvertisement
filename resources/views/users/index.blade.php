@extends('layouts.app')

@section('title', 'Bruger indstillinger')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap4.min.css') }}">
@endsection
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Bruger indstillinger</h1>
            @can('admin')
                <a href="{{ route('users.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                        class="fas fa-download fa-sm text-white-50"></i> Opret ny bruger</a>
            @endcan
        </div>

        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Alle brugere</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Navn</th>
                                <th>Rolle</th>
                                <th>Handlinger</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Navn</th>
                                <th>Rolle</th>
                                <th>Handlinger</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>
                                        @foreach ($user->getRoleNames() as $role)
                                            <span class="badge badge-success">{{ $role }}</span>
                                        @endforeach
                                    </td>
                                    <td>
                                        <form action="{{ route('users.destroy', $user->id) }}" method="post">
                                            @csrf
                                            <a href="{{ route('users.show', $user->id) }}"
                                                class="btn btn-info btn-circle"><i class="fas fa-eye"></i></a>
                                            <a href="{{ route('users.edit', $user->id) }}"
                                                class="btn btn-primary btn-circle">
                                                <i class="fas fa-edit"></i>
                                            </a>
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
    <!-- /.container-fluid -->
@endsection
@section('js')
    <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('js/demo/datatables-demo.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('#admin').addClass('active');
            $('#user').addClass('active');
        });
    </script>
@endsection
