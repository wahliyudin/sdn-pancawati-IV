@extends('layouts.admin.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Tarif Pembayaran</h3>
                        <a href="" class="btn btn-sm btn-primary float-right"><i class="fas fa-plus mr-2"></i>
                            Tambah
                            Data</a>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="tarif-pembayaran" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Tipe Pembayaran</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($type_of_payments as $type_of_payment)
                                    <tr>
                                        <td>{{ $type_of_payment->name }}</td>
                                        <td>
                                            <div class="d-flex align-item-center">
                                                <a class="btn btn-sm btn-primary mr-2"
                                                    href="{{ route('panitia.tarif-pembayaran.by-tipe', Crypt::encrypt($type_of_payment->id)) }}"><i
                                                        class="fas fa-eye mr-1"></i> Tarif Pembayaran</a>
                                                {{-- <form
                                                    action="{{ route('panitia.tarif-pembayaran.destroy', Crypt::encrypt($type_of_payment->id)) }}"
                                                    method="POST"
                                                    onsubmit="if(confirm('{{ __('Are you sure to delete this item ?') }}')){ return true }else{ return false }">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i
                                                            class="fa fa-fw fa-trash"></i> {{ __('Delete') }}</button>
                                                </form> --}}
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
    </div>
@endsection
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
            $("#tarif-pembayaran").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#tarif-pembayaran_wrapper .col-md-6:eq(0)');
        });
    </script>
@endpush
