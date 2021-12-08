@extends('layouts.app')

@section('title', 'Rolle indstillinger')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">Rolle Management</h1>
                    @can('role-create')
                        <a href="{{ route('roles.create') }}"
                            class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-plus fa-sm text-white-50"></i> Opret Ny Rolle</a>
                    @endcan
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
                    <table class="table table-bordered table-hover" id="roleDatatable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Rolle</th>
                                <th width="480px">Handlinger</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Rolle</th>
                                <th>Handlinger</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($roles as $role)
                                <tr>
                                    <td>{{ $role->name }}</td>
                                    <td>
                                        
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

@endsection
