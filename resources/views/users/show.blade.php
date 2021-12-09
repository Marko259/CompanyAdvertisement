@extends('layouts.app')

@section('title', 'Vis bruger - ' . $user->id)
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">Vis Bruger - {{ $user->name }}</h1>
                    <a href="{{ route('users.index') }}" class="btn btn-primary btn-icon-split btn-sm">
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
                        <strong>Navn:</strong>
                        {{ $user->name }}
                    </div>
                </div>
                <div class="card mb-4 py-3 border-left-info">
                    <div class="card-body">
                        <strong>Email:</strong>
                        {{ $user->email }}
                    </div>
                </div>
                <div class="card mb-4 py-3 border-left-success">
                    <div class="card-body">
                        <strong>Roller:</strong>
                        @if (!empty($user->getRoleNames()))
                            @foreach ($user->getRoleNames() as $v)
                                <label class="badge badge-success">{{ $v }}</label>
                            @endforeach
                        @endif
                    </div>
                </div>
                <div class="card mb-4 py-3 border-left-warning">
                    <div class="card-body">
                        <strong>Reklamer:</strong> <br>
                        @if ($user->advertisements()->get()->isNotEmpty())
                            @foreach ($user->advertisements()->get() as $adverts)
                                <p>{{ $adverts->title }},</p>
                            @endforeach
                        @else
                            <p>Ingen reklamer tilknyttet til denne bruger.</p>
                        @endif
                    </div>
                </div>
                <div class="card mb-4 py-3 border-left-secondary">
                    <div class="card-body">
                        <strong>Noget andet:</strong>
                        <code>TBD</code>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        $(document).ready(function() {
            $("#admin").addClass("active");
            $("#user").addClass("active");
        });
    </script>
@endsection
