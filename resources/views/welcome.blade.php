@extends('layouts.app')
@section('css')

@endsection
@section('content')
    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h5 mb-0 text-gray-800">Velkommen til {{ config('app.name') }}</h1>
        </div>
        <h3 class="h6 mb-0 text-gray-800">Scroll for at se alle vores reklamer.</h3>

        <div class="mb-5"></div>
        @if ($advertisements->isNotEmpty())
            @foreach ($advertisements as $advert)
                <div class="row justify-content-center">
                    <!-- Area Chart -->
                    <div class="col-xl-8 col-lg-7">
                        <div class="card shadow mb-4">
                            <!-- Card Header - Dropdown -->
                            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <h6 class="m-0 font-weight-bold text-primary"><a class="text-decoration-none"
                                        href="{{ route('advert.show', $advert->id) }}"
                                        target="_blank">{{ $advert->title }}</a></h6>
                            </div>
                            <!-- Card Body -->
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
                                <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                                    @foreach ($advert->filters()->get() as $filter)
                                        <form action="{{ route('search') }}" method="get">
                                            <input type="hidden" name="search" value="{{ $filter->name }}">
                                            <div class="btn-group mr-2">
                                                <button type="submit" class="btn btn-info badge badge-info"
                                                    role="group">{{ $filter->name }}</button>
                                            </div>
                                        </form>
                                    @endforeach
                                </div>
                                <div class="mt-2"></div>
                                <a href="{{ route('advert.show', $advert->id) }}"
                                    class="btn btn-primary btn-icon-split btn-sm" target="_blank"><span
                                        class="icon text-white-50"><i class="fas fa-eye"></i></span><span
                                        class="text">Læs mere her</span></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mb-4"></div>
            @endforeach
        @else
            <h3 class="h6 mb-0 text-gray-800">Der blev ikke fundet nogle resultater.</h3>
        @endif

    </div>
@endsection