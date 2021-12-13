@extends('layouts.app')

@section('title', 'Dashboard')
@section('content')
    <!-- Main Content -->
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            @can('user')
                <a href="{{ route('advert.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                        class="fas fa-plus fa-sm text-white-50"></i> Opret Ny Reklame</a>
            @endcan
        </div>

        <!-- Content Row -->
        <div class="row">

            <!-- Reklame tæller -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Dine reklamer</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    {{ Auth::user()->advertisements()->count() }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-bullhorn fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Filter tæller -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Dine Filter</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    @php
                                        $filters = [];
                                    @endphp
                                    @foreach (Auth::user()->advertisements()->get()
        as $advert)
                                        @php
                                            array_push($filters, $advert->filters()->count());
                                        @endphp
                                    @endforeach
                                    {{ array_sum($filters) }}
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-filter fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @if (Auth::user()->advertisements()->get()->isNotEmpty())
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h2 class="h4 mb-0 text-gray-800">Dine reklamer</h2>
            </div>
        @endif


        <div class="row">
            @foreach (Auth::user()->advertisements()->get()
        as $advert)
                <div class="col-lg-4 mb-4 d-flex align-self-stretch">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <div class="row align-items-center justify-content-center">
                                <h6 class="m-0 font-weight-bold text-primary">
                                    <a href="{{ route('advert.show', $advert->id) }}"
                                        target="_blank">{{ $advert->title }}</a>
                                </h6>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="text-center">
                                <img src="{{ asset('images/undraw_posting_photo.svg') }}" alt=""
                                    class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;">
                            </div>
                            <h6 class="m-0 font-weight-bold text-primary">
                                <a href="{{ route('advert.show', $advert->id) }}"
                                    target="_blank">{{ $advert->title }}</a>
                            </h6>
                            <hr>
                            <p>@markdown($advert->description)</p>
                            <span>Filter:</span>
                            <div class="mt-auto"></div>
                            @foreach ($advert->filters()->get() as $filter)
                                <p class="badge badge-info">{{ $filter->name }}</p>
                            @endforeach
                            <div class="mt-2"></div>
                            <a href="{{ route('advert.show', $advert->id) }}"
                                class="btn btn-primary btn-icon-split btn-sm" target="_blank"><span
                                    class="icon text-white-50"><i class="fas fa-eye"></i></span><span
                                    class="text">Se din reklame her</span></a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
    <!-- /.container-fluid -->
@endsection
@section('js')
    <script>
        $(document).ready(function() {
            $('#dashboard').addClass('active');
        });
    </script>
@endsection
