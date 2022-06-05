@extends('layouts.admin.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('panitia.laporan.export') }}" target="_blank" method="GET"
                            class="row">
                            @csrf
                            <div class="form-group col-md-5">
                                <label>Tanggal Pertama</label>
                                <div class="input-group date" id="first_date" data-target-input="nearest">
                                    <input type="text" required name="first_date"
                                        class="form-control datetimepicker-input {{ $errors->has('tanggal') ? ' is-invalid' : '' }}"
                                        data-target="#first_date" value="">
                                    <div class="input-group-append" data-target="#first_date" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-5">
                                <label>Tanggal Akhir</label>
                                <div class="input-group date" id="last_date" data-target-input="nearest">
                                    <input type="text" required name="last_date"
                                        class="form-control datetimepicker-input {{ $errors->has('tanggal') ? ' is-invalid' : '' }}"
                                        data-target="#last_date" value="">
                                    <div class="input-group-append" data-target="#last_date" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-2 d-flex align-items-end">
                                <button type="submit" class="btn btn-primary"><i class="fas fa-print mr-2"></i>
                                    Cetak</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('css')
    {{-- <link rel="stylesheet" href="{{ asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}"> --}}
@endpush
@push('script')
    <script src="{{ asset('plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('plugins/inputmask/jquery.inputmask.min.js') }}"></script>
    {{-- <script src="{{ asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script> --}}
    <script>
        $('#first_date').datetimepicker({
            format: 'L'
        });
        $('#last_date').datetimepicker({
            format: 'L'
        });
    </script>
@endpush
