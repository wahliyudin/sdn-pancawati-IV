@extends('layouts.admin.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card card-default">
                    <div class="card-body">
                        <form action="{{ route('panitia.payment') }}" method="post" class="align-items-end">
                            @csrf
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Siswa</label>
                                        <select name="student_id" class="student_id form-control select2"
                                            style="width: 100%;">
                                            <option selected="selected" disabled>-- pilih --</option>
                                            @foreach ($students as $student)
                                                <option value="{{ $student->id }}">{{ $student->identity->nama }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Jenis Pembayaran</label>
                                        <select name="type_of_payment_id" class="tipe-pembayaran form-control select2"
                                            style="width: 100%;">
                                            <option selected="selected" disabled>-- pilih --</option>
                                            @foreach ($type_of_payments as $type_of_payment)
                                                <option value="{{ $type_of_payment->id }}">{{ $type_of_payment->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row col-md-6">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Tanggal</label>
                                            <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                                <input type="text" name="tanggal"
                                                    class="form-control datetimepicker-input {{ $errors->has('tanggal') ? ' is-invalid' : '' }}"
                                                    data-target="#reservationdate" value="">
                                                <div class="input-group-append" data-target="#reservationdate"
                                                    data-toggle="datetimepicker">
                                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                </div>
                                            </div>
                                            @error('tanggal')
                                                <p class="invalid-feedback">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>No Cek</label>
                                            <input type="text" name="payment_number" value="{{ $payment_number }}"
                                                class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 row">
                                    <div class="form-group col-md-6">
                                        <label>Jumlah Tagihan</label>
                                        <input type="text" name="billing" readonly class="billing form-control"
                                            id="rupiah1">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Jumlah Pembayaran</label>

                                        <input type="text" class="form-control" name="payment" id="rupiah2">
                                        <!-- /.input group -->
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Keterangan</label>
                                        <input type="text" name="description" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary float-right">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-12">
                <div class="card">
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="payment" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Keterangan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- @foreach ($type_of_payments as $type_of_payment)
                                    <tr>
                                        <td>{{ $type_of_payment->name }}</td>
                                        <td>{{ $type_of_payment->description }}</td>
                                        <td>
                                            <div class="d-flex align-item-center">
                                                <a class="btn btn-sm btn-primary mr-2"
                                                    href="{{ route('panitia.payment.edit', Crypt::encrypt($type_of_payment->id)) }}"><i
                                                        class="fas fa-edit mr-1"></i> Edit</a>
                                                <form
                                                    action="{{ route('panitia.payment.destroy', Crypt::encrypt($type_of_payment->id)) }}"
                                                    method="POST"
                                                    onsubmit="if(confirm('{{ __('Are you sure to delete this item ?') }}')){ return true }else{ return false }">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i
                                                            class="fa fa-fw fa-trash"></i> {{ __('Delete') }}</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach --}}
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
    </div>
@endsection
@include('layouts.inc.tosatr')
@push('css')
    <link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css') }}"> --}}
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet"
        href="{{ asset('') }}plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <style>
        .select2-container .select2-selection--single {
            height: calc(2.25rem + 4px) !important;
        }

    </style>
@endpush
@push('script')
    <script src="{{ asset('plugins/select2/js/select2.full.min.js') }}"></script>
    <!-- InputMask -->
    <script src="{{ asset('') }}plugins/moment/moment.min.js"></script>
    <script src="{{ asset('') }}plugins/inputmask/jquery.inputmask.min.js"></script>
    <script>
        $(function() {
            //Initialize Select2 Elements
            $('.select2').select2()

            //Initialize Select2 Elements
            $('.select2bs4').select2({
                theme: 'bootstrap4'
            })

        })
    </script>
    <script>
        $('#reservationdate').datetimepicker({
            format: 'L'
        });
        $('[data-mask]').inputmask()

        $('.student_id').change(function(e) {
            e.preventDefault();
            const id = e.target.value;
            const id_tipe = $('.tipe-pembayaran').val();
            if (id_tipe && id) {
                $.ajax({
                    url: 'http://ppdb-angel.loc/api/tipe-pembayaran/' + id_tipe + '/siswa/' + id,
                    type: 'get',
                    success: function(response) {
                        $('.billing').val(formatRupiah(String(response.billing), 'Rp. '));
                        // console.log(String(response.billing));
                    }
                });
            }
        });
        $('.tipe-pembayaran').change(function(e) {
            e.preventDefault();
            const id_tipe = e.target.value;
            const id = $('.student_id').val();
            if (id_tipe && id) {
                $.ajax({
                    url: 'http://ppdb-angel.loc/api/tipe-pembayaran/' + id_tipe + '/siswa/' + id,
                    type: 'get',
                    success: function(response) {
                        $('.billing').val(formatRupiah(String(response.billing), 'Rp. '));
                        // console.log(String(response.billing));
                    }
                });
            }
        });
    </script>
    <script type="text/javascript">
        var rupiah1 = document.getElementById('rupiah1');
        var rupiah2 = document.getElementById('rupiah2');
        rupiah1.addEventListener('keyup', function(e) {
            // tambahkan 'Rp.' pada saat ketik nominal di form kolom input
            // gunakan fungsi formatRupiah() untuk mengubah nominal angka yang di ketik menjadi format angka
            rupiah1.value = formatRupiah(this.value, 'Rp. ');
        });
        rupiah2.addEventListener('keyup', function(e) {
            // tambahkan 'Rp.' pada saat ketik nominal di form kolom input
            // gunakan fungsi formatRupiah() untuk mengubah nominal angka yang di ketik menjadi format angka
            rupiah2.value = formatRupiah(this.value, 'Rp. ');
        });
        /* Fungsi formatRupiah */
        function formatRupiah(angka, prefix) {
            var number_string = angka.replace(/[^,\d]/g, '').toString(),
                split = number_string.split(','),
                sisa = split[0].length % 3,
                rupiah = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            // tambahkan titik jika yang di input sudah menjadi angka satuan ribuan
            if (ribuan) {
                separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }

            rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
            return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
        }
    </script>
@endpush
@push('css')
    <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endpush
@push('script')
    <script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
    <script>
        $(function() {
            $("#payment").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
            }).buttons().container().appendTo('#payment_wrapper .col-md-6:eq(0)');
        });
    </script>
@endpush
