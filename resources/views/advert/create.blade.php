@extends('layouts.app')

@section('title', 'Opret ny reklame')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/flatpickr.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-tagsinput.css') }}">
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">Opret ny reklame</h1>
                    <a href="{{ route('advert.index') }}" class="btn btn-primary btn-icon-split btn-sm">
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
            <form method="POST" action="{{ route('advert.store') }}">
                @csrf
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                            <div class="form-group">
                                <strong>Titel:</strong>
                                <input name="title" placeholder="Titel" class="form-control" value="{{ old('title') }}"
                                    type="text">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Beskrivelse:</strong>
                                <textarea class="form-control" name="description" style="height=150px;"
                                    placeholder="Beskrivelse">{{ old('description') }}</textarea>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Kontakt information:</strong>
                                <input type="text" name="contact_info" value="{{ old('contact_info') }}" class="form-control"
                                    placeholder="Indtast email eller tlf. nr.">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Pris:</strong>
                                <input type="number" name="price" value="{{ old('price') }}" class="form-control"
                                    placeholder="Pris pr. time">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 d-flex justify-content-center">
                            <div class="form-group">
                                <strong>Start dato for firma:</strong>
                                <div class="input-group input-group-joined" style="width: 16.5rem;">
                                    <span class="input-group-text">
                                        <i class="fas fa-calendar"></i>
                                    </span>
                                    <input id="date" class="datepicker form-control" type="text" name="start_date"
                                        placeholder="Tryk for at v??lge dato" value="{{ old('start_date') }}" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 d-flex justify-content-center">
                            <div class="form-group">
                                <strong>Filtrer:</strong>
                                <div class="input-group input-group-joined">
                                    <input type="text" name="filter" class="form-control" placeholder="Indtast filter" required
                                    data-role="tagsinput">
                                </div>
                                <p class="small">Tryk enter efter hvert filter</p>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 text-center mb-3">
                            <button type="submit" class="btn btn-primary"><i class="fas fa-plus"></i> Opret
                                reklame</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('js')
    <script src="{{ asset('js/flatpickr.min.js') }}"></script>
    <script src="{{ asset('js/da.js') }}"></script>
    <script src="{{ asset('js/bootstrap-tagsinput.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#actions').addClass('active');
            $('#advert').addClass('active');

            $('div').tooltip();
            var defaultDate = "{{ old('date') }}"
            $(".datepicker").flatpickr({
                disableMobile: true,
                altInput: true,
                altFormat: "F j, Y H:i",
                allowInput: true,
                dateFormat: "Y-m-d H:i",
                defaultDate: defaultDate,
                locale: 'da',
            });
            $('.flatpickr-input:visible').on('focus', function() {
                $(this).blur();
            });
            $('.flatpickr-input:visible').prop('readonly', false);

            $('input[name="filter"]').change(function() {
                $(".tag").removeClass('label').removeClass('label-info').addClass('badge').addClass(
                    'badge-info');
            });
        });
    </script>
@endsection
