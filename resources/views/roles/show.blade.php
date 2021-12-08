@extends('layouts.app')

@section('title', 'Vis Rolle - ' . $role->name)
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">Vis Rolle - {{ $role->name }}</h1>
                    <a href="{{ route('roles.index') }}" class="btn btn-primary btn-icon-split btn-sm">
                        <span class="icon text-white-50">
                            <i class="fas fa-arrow-left"></i>
                        </span>
                        <span class="text">Tilbage</span>
                    </a>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col">
                <br>
                <div class="card mb-4 py-3 border-left-primary">
                    <div class="card-body">
                        <strong>Rolle:</strong>
                        {{ $role->name }}
                    </div>
                </div>
                <div class="card mb-4 py-3 border-left-info">
                    <div class="card-body">
                        <strong>Rettigheder:</strong><br>
                        @if (!empty($rolePermissions))
                            @foreach ($rolePermissions as $permissions)
                                <div>{{ $permissions->name }},</div>
                            @endforeach
                        @endif
                    </div>
                </div>
                <div class="card mb-4 py-3 border-left-warning">
                    <div class="card-body">
                        <strong>Brugere:</strong>
                        @if (!empty($roleUsers))
                            @foreach ($roleUsers as $users)
                                <div>{{ $users->name }},</div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        $(document).ready(function () {
            $('#admin').addClass('active');
            $("#role").addClass("active");
        });
    </script>
@endsection