@extends('layouts.user.app')

@section('content')
    <div class="wrapper-content">
        <h1 class="content-title">PPDB</h1>
        <div class="row" style="margin-top: 20px">
            <div class="col-12">
                <!-- Custom Tabs -->
                <div class="card">
                    <div class="card-header d-flex p-0">
                        <h3 class="card-title p-3">Tabs</h3>
                        <ul class="nav nav-pills ml-auto p-2">
                            <li class="nav-item"><a class="nav-link active" href="#identitas-diri"
                                    data-toggle="tab">Identitas
                                    Diri</a>
                            </li>
                            <li class="nav-item"><a class="nav-link" href="#data-orang-tua"
                                    data-toggle="tab">Data Orang
                                    Tua</a>
                            </li>
                            <li class="nav-item"><a class="nav-link" href="#kirim-data" data-toggle="tab">Kirim
                                    Data</a>
                            </li>
                        </ul>
                    </div><!-- /.card-header -->
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="tab-pane active" id="identitas-diri">
                                <form action="{{ route('pendaftaran.identitas-diri.store') }}" method="post">
                                    @csrf
                                    @include('user.pendaftaran.identitas-diri')
                                </form>
                            </div>
                            <!-- /.tab-pane -->
                            <div class="tab-pane" id="data-orang-tua">
                                @include('user.pendaftaran.data-orang-tua')
                            </div>
                            <!-- /.tab-pane -->
                            <div class="tab-pane" id="kirim-data">
                                <div class="box box-info padding-1" style="width: 80vw;">
                                    <div class="box-body">
                                        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                                        <p><label for="checkbox"><input type="checkbox" id="checkbox"> Dengan mengirim data
                                                diri, orang tua, data akademik, data prestasi (Jalur Prestasi) dan data
                                                bantuan (Jalur Siswa Kurang Mampu) maka kamu sudah mematuhi segala peraturan
                                                pada PPDB ini</label></p>
                                    </div>
                                    <div class="box-footer mt20">
                                        <button type="submit" disabled class="btn btn-primary" id="btn-kirim-data">Kirim
                                            Data</button>
                                    </div>
                                </div>
                                <script>
                                    document.getElementById('checkbox').onchange = e => {
                                        if (e.target.checked)
                                            document.getElementById('btn-kirim-data').disabled = false
                                        else
                                            document.getElementById('btn-kirim-data').disabled = true
                                    }
                                </script>
                            </div>
                            <!-- /.tab-pane -->
                        </div>
                        <!-- /.tab-content -->
                    </div><!-- /.card-body -->
                </div>
                <!-- ./card -->
            </div>
            <!-- /.col -->
        </div>
    </div>
@endsection
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
    <script>
        $('#reservationdate').datetimepicker({
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
                var target = tab.id.replace('-tab', '')
                document.getElementById(target).classList.remove('show', 'active')
                tab.classList.remove('active')
            })
            document.querySelector(_target).classList.toggle('show')
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
