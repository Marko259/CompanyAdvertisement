@extends('layouts.app')

@section('title', 'Rediger rolle - ' . $role->name)
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">Rediger rolle - {{ $role->name }}</h1>
                    <a href="{{ route('roles.index') }}" class="btn btn-primary btn-icon-split btn-sm">
                        <span class="icon text-white-50">
                            <i class="fas fa-arrow-left"></i>
                        </span>
                        <span class="text">Tilbage</span>
                    </a>
                </div>
            </div>
        </div>


        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <strong>Whoops!</strong> Der var et problem med dit input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Bruger input</h6>
            </div>
            <form method="POST" action="{{ route('roles.update', $role->id) }}">
                @method('PATCH')
                @csrf
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                            <div class="form-group">
                                <strong>Rolle:</strong>
                                <input name="name" placeholder="Rolle Navn?" class="form-control" type="text"
                                    value="{{ $role->name }}">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Rettigheder:</strong>
                                <br />
                                @foreach ($permission as $value)
                                    <label><input class="name" name="permission[]" value="{{ $value->id }}"
                                            {{ in_array($value->id, $rolePermissions) ? 'checked="checked"' : '' }}
                                            type="checkbox">{{ $value->name }}</label>
                                    <br />
                                @endforeach
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 text-center mb-3">
                            <button type="submit" class="btn btn-primary"><i class="fas fa-check"></i> Opdater</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('js')
    <script>
        $(document).ready(function() {
            $("#admin").addClass('active');
            $("#role").addClass('active');
        });
    </script>
@endsection
