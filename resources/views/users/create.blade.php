@extends('layouts.app')

@section('title', 'Opret Bruger')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">Opret ny bruger</h1>
                    <a href="{{ route('users.index') }}" class="btn btn-primary btn-icon-split btn-sm">
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
            <form method="POST" action="{{ route('users.store') }}">
                @csrf
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                            <div class="form-group">
                                <strong>Navn:</strong>
                                <input name="name" type="text" value="{{ old('name') }}" placeholder="Navn?"
                                    class="form-control">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Email:</strong>
                                <input name="email" type="text" placeholder="Email?" value="{{ old('email') }}"
                                    class="form-control">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Password:</strong>
                                <input name="password" placeholder="Password?" class="form-control" type="password">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Bekræft Password:</strong>
                                <input name="confirm-password" type="password" placeholder="Bekræft Password"
                                    class="form-control">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Rolle:</strong>
                                <select name="roles[]" class="form-control" multiple>
                                    <option value="">Ingen Rolle</option>
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->name }}">{{ $role->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 text-center mb-3">
                            <button type="submit" class="btn btn-primary"><i class="fas fa-plus"></i> Opret</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('js')
    <script>
        $(document).ready(function () {
            $("#admin").addClass('active');
            $('#user').addClass('active');
        });
    </script>
@endsection