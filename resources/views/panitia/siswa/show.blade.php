@extends('layouts.admin.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        {{ $message }}
                    </div>
                @endif

                @if ($message = $user->alasan_kelulusan)
                    <div class="alert alert-warning">
                        {{ $message }}
                    </div>
                @endif
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ $user->name }}</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('panitia.siswa.index') }}"> Back</a>
                            @if ($user->status_verifikasi == 1)
                                <a class="btn btn-success btn-sm"
                                    href="{{ route('panitia.siswa.resend-verified', Crypt::encrypt($user->id)) }}"
                                    onclick="if(confirm('Apakah anda yakin akan mengirim ulang email verifikasi untuk akun pendaftar ini ?')){return true}else{return false}">
                                    Resend Verifikasi</a>
                            @else
                                <a class="btn btn-success btn-sm"
                                    href="{{ route('panitia.siswa.verified', Crypt::encrypt($user->id)) }}"
                                    onclick="if(confirm('Apakah anda yakin akan memverifikasi akun pendaftar ini ?')){return true}else{return false}">Verifikasi
                                    Akun Pendaftar</a>
                            @endif
                            @if ($user->status_kelulusan == 2)
                                <a class="btn btn-success btn-sm"
                                    href="{{ route('panitia.siswa.verif-berkas', [Crypt::encrypt($user->id), 4]) }}"
                                    onclick="if(confirm('Apakah anda yakin akan meluluskan pendaftar ini ?')){return true}else{return false}">
                                    Lulus</a>
                                <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modalTidakLulus">
                                    Tidak Lulus</button>
                                <div id="modalTidakLulus" class="modal fade" tabindex="-1" role="dialog"
                                    aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title mt-0">Tidak Lulus</h4>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form
                                                    action="{{ route('panitia.siswa.verif-berkas', [Crypt::encrypt($user->id), 5]) }}"
                                                    id="formtidaklulus">
                                                    <label for="">Catatan</label>
                                                    <textarea name="catatan_kelulusan" class="form-control" cols="30" rows="10"></textarea>
                                                </form>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary waves-effect"
                                                    data-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-primary waves-effect waves-light"
                                                    onclick="formtidaklulus.submit()">Submit</button>
                                            </div>
                                        </div><!-- /.modal-content -->
                                    </div><!-- /.modal-dialog -->
                                </div><!-- /.modal -->
                            @endif
                            @if ($user->status_kelulusan == 1)
                                <a class="btn btn-success btn-sm"
                                    href="{{ route('panitia.siswa.verif-berkas', [Crypt::encrypt($user->id), 2]) }}"
                                    onclick="if(confirm('Apakah anda yakin akan memverifikasi berkas pendaftar ini ?')){return true}else{return false}">
                                    Verifikasi Berkas</a>
                                <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#myModal">
                                    Kembalikan Berkas</button>
                                <!-- sample modal content -->
                                <div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title mt-0">Kembalikan Berkas</h4>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form
                                                    action="{{ route('panitia.siswa.verif-berkas', [Crypt::encrypt($user->id), -1]) }}"
                                                    id="formkembali">
                                                    <label for="">Catatan Pengembalian</label>
                                                    <textarea name="catatan_kelulusan" class="form-control" cols="30" rows="10"></textarea>
                                                </form>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary waves-effect"
                                                    data-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-primary waves-effect waves-light"
                                                    onclick="formkembali.submit()">Kembalikan Berkas</button>
                                            </div>
                                        </div><!-- /.modal-content -->
                                    </div><!-- /.modal-dialog -->
                                </div><!-- /.modal -->

                                <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modalTolak"> Tolak
                                    Berkas</button>
                                <!-- sample modal content -->
                                <div id="modalTolak" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title mt-0">Tolak Berkas</h4>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form
                                                    action="{{ route('panitia.siswa.verif-berkas', [Crypt::encrypt($user->id), 3]) }}"
                                                    id="formtolak">
                                                    <label for="">Catatan Penolakan</label>
                                                    <textarea name="catatan_kelulusan" class="form-control" cols="30" rows="10"></textarea>
                                                </form>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary waves-effect"
                                                    data-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-primary waves-effect waves-light"
                                                    onclick="formtolak.submit()">Tolak Berkas</button>
                                            </div>
                                        </div><!-- /.modal-content -->
                                    </div><!-- /.modal-dialog -->
                                </div><!-- /.modal -->
                            @endif
                        </div>
                    </div>

                    <div class="card-body">
                        <table class="table table-bordered">
                            <tr>
                                <td><b>Nama</b></td>
                                <td>{{ $user->identity->nama }}</td>
                            </tr>
                            <tr>
                                <td><b>E-Mail</b></td>
                                <td>{{ $user->email }}</td>
                            </tr>
                            <tr>
                                <td><b>Status Akun</b></td>
                                <td>{!! $user->status_verif !!}</td>
                            </tr>
                        </table>

                        <center>
                            <a href="{{ Storage::url($user->file_url) }}">
                                <img src="{{ Storage::url($user->file_url) }}" alt="" width="350px">
                            </a>
                        </center>
                    </div>
                </div>

                @if ($user->status_kelulusan >= 1)
                    @include('panitia.siswa.ringkasan')
                @endif
            </div>
        </div>
    </div>
@endsection
@include('layouts.inc.tosatr')
@push('css')
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet"
        href="{{ asset('') }}plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('') }}plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="{{ asset('') }}plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
@endpush
@push('script')
    <script src="{{ asset('plugins/bootstrap-filestyle/js/bootstrap-filestyle.min.js') }}"></script>
    <script>
        var kabupaten_id, kecamatan_id, desa_kel_id
        @if ($identitas->provinsi && is_numeric($identitas->provinsi))
            kabupaten_id = {{ $identitas->kabupaten }}
            kecamatan_id = {{ $identitas->kecamatan }}
            desa_kel_id = {{ $identitas->desa_kel }}
        @endif
        function loadKota(val) {
            return new Promise(resolve => {
                kabupaten.innerHTML = '<option value="">Memuat...</option>'
                kecamatan.innerHTML = '<option value="">Memuat...</option>'
                desa_kel.innerHTML = '<option value="">Memuat...</option>'
                fetch('/api/get-regency/' + val)
                    .then(res => res.json())
                    .then(res => {
                        kabupaten.innerHTML = '<option value="">- Pilih Kabupaten / Kota -</option>'
                        res.forEach(v => {
                            var selected = kabupaten_id == v.id ? 'selected=""' : ''
                            kabupaten.innerHTML += '<option value="' + v.id + '" ' + selected + '>' + v
                                .nama + '</option>'
                        })
                        kecamatan.innerHTML =
                            '<option value="">- Pilih Kabupaten / Kota Terlebih Dahulu -</option>'
                        desa_kel.innerHTML =
                            '<option value="">- Pilih Kabupaten / Kota Terlebih Dahulu -</option>'

                        resolve()
                    })
            })
        }

        function loadKecamatan(val) {
            return new Promise(resolve => {
                kecamatan.innerHTML = '<option value="">Memuat...</option>'
                desa_kel.innerHTML = '<option value="">Memuat...</option>'
                fetch('/api/get-district/' + val)
                    .then(res => res.json())
                    .then(res => {
                        kecamatan.innerHTML = '<option value="">- Pilih Kecamatan -</option>'
                        res.forEach(v => {
                            var selected = kecamatan_id == v.id ? 'selected=""' : ''
                            kecamatan.innerHTML += '<option value="' + v.id + '" ' + selected + '>' + v
                                .nama + '</option>'
                        })
                        desa_kel.innerHTML = '<option value="">- Pilih Kecamatan Terlebih Dahulu -</option>'

                        resolve()
                    })
            })
        }

        function loadDesa(val) {
            return new Promise(resolve => {
                desa_kel.innerHTML = '<option value="">Memuat...</option>'
                fetch('/api/get-village/' + val)
                    .then(res => res.json())
                    .then(res => {
                        desa_kel.innerHTML = '<option value="">- Pilih Desa / Kelurahan -</option>'
                        res.forEach(v => {
                            var selected = desa_kel_id == v.id ? 'selected=""' : ''
                            desa_kel.innerHTML += '<option value="' + v.id + '" ' + selected + '>' + v
                                .nama + '</option>'
                        })

                        resolve();
                    })
            })
        }

        @if ($identitas->provinsi && is_numeric($identitas->provinsi))
            loadKota({{ $identitas->provinsi }})
                .then(res => {
                    return loadKecamatan({{ $identitas->kabupaten }})
                })
                .then(res => {
                    loadDesa({{ $identitas->kecamatan }})
                })
        @endif
    </script>

    <script src="{{ asset('') }}plugins/select2/js/select2.full.min.js"></script>
    <!-- InputMask -->
    <script src="{{ asset('') }}plugins/moment/moment.min.js"></script>
    <script src="{{ asset('') }}plugins/inputmask/jquery.inputmask.min.js"></script>
    <!-- date-range-picker -->
    <script src="{{ asset('') }}plugins/daterangepicker/daterangepicker.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{ asset('') }}plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <script src="{{ asset('') }}plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
    <script>
        $(function() {
            bsCustomFileInput.init();
        });
    </script>
    <script>
        document.getElementById('checkbox').onchange = e => {
            if (e.target.checked)
                document.getElementById('btn-kirim-data').disabled = false
            else
                document.getElementById('btn-kirim-data').disabled = true
        }
    </script>
    <script>
        $('#reservationdate').datetimepicker({
            format: 'L'
        });
        $('#tanggal_ijazah').datetimepicker({
            format: 'L'
        });
        $('#tanggal_lahir_ayah').datetimepicker({
            format: 'L'
        });
        $('#tanggal_lahir_ibu').datetimepicker({
            format: 'L'
        });
    </script>
    <script>
        var all_tabs = document.querySelectorAll('.nav-link')
        var _target = localStorage.getItem('tab_active')

        @if (auth()->user()->status_kelulusan == 1)
            if (_target == '#kirim-data') {
                window.localStorage.removeItem('tab_active')
                _target = false
            }
        @endif

        function setTabActive(target) {
            window.localStorage.setItem('tab_active', target)
        }

        function loadTabActive(_target) {
            all_tabs.forEach(tab => {
                var target = tab.id.replace('-tab', '');
                document.getElementById(target).classList.remove('active')
                tab.classList.remove('active')
            })
            document.querySelector(_target).classList.toggle('active')
            document.querySelector(_target + '-tab').classList.toggle('active')
        }

        if (_target) {
            loadTabActive(_target)
        } else {
            _target = '#identitas-diri';
            loadTabActive(_target)
        }
    </script>
@endpush
