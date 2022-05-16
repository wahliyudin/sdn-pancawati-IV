@extends('layouts.admin.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        {{ $message }}
                    </div>
                @endif
                <div class="card">


                    <div class="card-body">
                        <form method="POST" action="{{ route('panitia.pengaturan.form-pendaftaran') }}">
                            @csrf
                            <input type="checkbox" name="status_pendaftaran"
                                {{ $setting && $setting->status_pendaftaran == 1 ? 'checked' : '' }} data-bootstrap-switch
                                data-off-color="danger" data-on-color="success">
                            <label for="">Status Form Pendaftaran</label>

                            <div class="clearfix"></div>
                            <button class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('script')
    <script src="{{ asset('plugins/bootstrap-switch/js/bootstrap-switch.min.js') }}"></script>
    <script>
        $(function() {
            $("input[data-bootstrap-switch]").each(function() {
                $(this).bootstrapSwitch('state', $(this).prop('checked'));
            })
        })
    </script>
@endpush
