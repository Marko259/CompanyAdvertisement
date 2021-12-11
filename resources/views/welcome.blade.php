<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('layouts.header')
</head>

<body id="page-top">
    <div class="wrapper">
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                @include('layouts.topbar')
                <div class="container-fluid">
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h5 mb-0 text-gray-800">Velkommen til {{ config('app.name') }}</h1>
                    </div>
                    <h3 class="h6 mb-0 text-gray-800">Scroll for at se alle vores reklamer.</h3>

                    <div class="mb-5"></div>

                    @foreach ($advertisements as $advert)
                        <div class="row justify-content-center">
                            <!-- Area Chart -->
                            <div class="col-xl-8 col-lg-7">
                                <div class="card shadow mb-4">
                                    <!-- Card Header - Dropdown -->
                                    <div
                                        class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
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
                                        @foreach ($advert->filters()->get() as $filter)
                                            <p class="badge badge-info">{{ $filter->name }}</p>
                                        @endforeach
                                        <div class="mt-2"></div>
                                        <a href="{{ route('advert.show', $advert->id) }}"
                                            class="btn btn-primary btn-icon-split btn-sm" target="_blank"><span
                                                class="icon text-white-50"><i class="fas fa-eye"></i></span><span
                                                class="text">Se reklamen her</span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mb-4"></div>
                    @endforeach
                </div>
            </div>
            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; {{ config('app.name') }}</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('js/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>
</body>

</html>
