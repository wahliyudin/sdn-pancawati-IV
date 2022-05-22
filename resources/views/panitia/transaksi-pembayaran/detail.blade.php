@extends('layouts.admin.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                @foreach ($payments as $payment)
                    <div class="card">
                        <div class="card-header">
                            <span class="text-lg">{{ $payment->typeOfPayment->name }}</span>
                            <a href="{{ route('panitia.exports.bukti-pembayaran', [
                                'student_id' => Crypt::encrypt($student->id),
                                'type_of_payment_id' => Crypt::encrypt($payment->typeOfPayment->id),
                                'name_type_of_payment' => Crypt::encrypt($payment->typeOfPayment->name),
                            ]) }}"
                                target="_blank" class="btn btn-sm btn-success mr-2 float-right"><i
                                    class="fas fa-print mr-1"></i>
                                Cetak All</a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="payment{{ $payment->id }}" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>No Pembayaran</th>
                                        <th>Jumlah Bayar</th>
                                        <th>Keterangan</th>
                                        <th>Tanggal</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($payment->itemPayments as $item_payment)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item_payment->payment_number }}</td>
                                            <td>Rp. {{ numberFormat((int) $item_payment->billing) }}</td>
                                            <td>{{ $item_payment->description }}</td>
                                            <td>{{ $item_payment->tanggal }}
                                            </td>
                                            <td>
                                                <div class="d-flex align-item-center">
                                                    <button class="btn btn-sm btn-danger mr-2">
                                                        <i class="fas fa-trash-alt mr-1"></i>
                                                        Hapus</button>
                                                    <a href="{{ route('panitia.exports.bukti-pembayaran.pertransaksi', [
                                                        'student_id' => Crypt::encrypt($student->id),
                                                        'item_payment_id' => Crypt::encrypt($item_payment->id),
                                                    ]) }}"
                                                        target="_blank" class="btn btn-sm btn-success mr-2"><i
                                                            class="fas fa-print mr-1"></i>
                                                        Cetak</a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
@include('layouts.inc.tosatr')
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
@endpush
@foreach ($payments as $payment)
    @push('script')
        <script>
            $(function() {
                $("#payment{{ $payment->id }}").DataTable({
                    "responsive": true,
                    "lengthChange": false,
                    "autoWidth": false,
                }).buttons().container().appendTo('#payment{{ $payment->id }}_wrapper .col-md-6:eq(0)');
            });
        </script>
    @endpush
@endforeach
