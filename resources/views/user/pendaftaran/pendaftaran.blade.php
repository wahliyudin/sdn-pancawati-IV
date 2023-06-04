@extends('layouts.user.app')

@section('content')
    <div class="wrapper-content">
        <h1 class="content-title">PPDB</h1>
        <div class="row" style="margin-top: 20px">
            <div class="col-12">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        {{ $message }}
                    </div>
                @endif
                @if ($message = Session::get('error'))
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                @endif
                @if (in_array(auth()->user()?->status_kelulusan, [0, -1]))
                    <!-- Custom Tabs -->
                    <div class="card">
                        <div class="card-header d-flex p-0">
                            <h3 class="card-title p-3">Tabs</h3>
                            <ul class="nav nav-pills ml-auto p-2">
                                <li class="nav-item"><a class="nav-link active" id="identitas-diri-tab"
                                        onclick="setTabActive('#identitas-diri')" id="identitas-diri" href="#identitas-diri"
                                        data-toggle="tab">Identitas
                                        Diri</a>
                                </li>
                                <li class="nav-item"><a class="nav-link" id="data-orang-tua-tab"
                                        onclick="setTabActive('#data-orang-tua')" id="data-orang-tua" href="#data-orang-tua"
                                        data-toggle="tab">Data Orang
                                        Tua</a>
                                </li>
                                <li class="nav-item"><a class="nav-link" id="kirim-data-tab"
                                        onclick="setTabActive('#kirim-data')" id="kirim-data" href="#kirim-data"
                                        data-toggle="tab">Kirim
                                        Data</a>
                                </li>
                            </ul>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="tab-pane active" id="identitas-diri">
                                    <form action="{{ route('pendaftaran.identitas-diri.store') }}"
                                        enctype="multipart/form-data" method="post">
                                        @csrf
                                        @include('user.pendaftaran.identitas-diri')
                                    </form>
                                </div>
                                <!-- /.tab-pane -->
                                <div class="tab-pane" id="data-orang-tua">
                                    <form action="{{ route('pendaftaran.data-orang-tua.store') }}" method="post">
                                        @csrf
                                        @include('user.pendaftaran.data-orang-tua')
                                    </form>
                                </div>
                                <!-- /.tab-pane -->
                                <div class="tab-pane" id="kirim-data">
                                    <form action="{{ route('pendaftaran.kirim') }}" method="post">
                                        @csrf
                                        <div class="box box-info padding-1" style="width: 80vw;">
                                            <div class="box-body">
                                                <input type="hidden" name="user_id" value="{{ auth()->user()?->id }}">
                                                <p><label for="checkbox"><input type="checkbox" id="checkbox"> Dengan
                                                        mengirim
                                                        data
                                                        diri dan orang tua maka kamu sudah mematuhi segala peraturan
                                                        pada PPDB ini</label></p>
                                            </div>
                                            <div class="box-footer mt20">
                                                <button type="submit" disabled class="btn btn-primary"
                                                    id="btn-kirim-data">Kirim
                                                    Data</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!-- /.tab-pane -->
                            </div>
                            <!-- /.tab-content -->
                        </div><!-- /.card-body -->
                    </div>
                    <!-- ./card -->
                @else
                    <div class="row text-center">
                        <div class="col-sm-12">
                            <h3 class="m-t-20">{{ env('APP_NAME') }} <br>
                                {{ __('Ringkasan Pendaftaran') }}</h3>
                            <div class="border mx-auto d-block m-b-20"></div>
                        </div>
                    </div>

                    @if (auth()->user()?->kelulusan_final != null)
                        <div class="row">
                            <div class="col-12">
                                <div
                                    class="alert {{ auth()->user()?->kelulusan_final == 'Lulus' ? 'alert-success' : 'alert-danger' }}">
                                    <h1 align="center">
                                        {{ auth()->user()?->kelulusan_final == 'Lulus' ? 'Selamat!' : 'Maaf!' }}
                                        Anda dinyatakan <b>"{{ auth()->user()?->kelulusan_final }}"</b> Sebagai siswa</h1>
                                    @if (auth()->user()?->kelulusan_final == 'Lulus')
                                        <br>
                                        <center>
                                            <h1>Nama : {{ auth()->user()?->identity?->nama }}</h1>
                                            <h1>NISN : {{ auth()->user()?->identity?->NISN }}</h1>
                                        </center>
                                    @endif
                                </div>
                            </div>

                            @if (auth()->user()?->kelulusan_final == 'Lulus')
                                <div class="col-12">
                                    <center>
                                        SILAHKAN DAFTAR ULANG DENGAN MEMBAWA PERSYARATAN SEBAGAI BERIKUT :
                                    </center>
                                    <ol>
                                        <li>Print Out asli pernyatan kelulusan (bukti tanda lulus)</li>
                                        <li>SKTL asli dari sekolah asal</li>
                                        <li>Fotokopi KK, fotokopi raport 1 s/d 5 fotokopi ktp orang tua, dan pas fhoto 4 x 6
                                            = 1 lembar </li>
                                        <li>Jalur prestasi melmapirkan fotokopi sertifikat yang telah di upload di akun
                                            PPDB.</li>
                                        <li>Khusus jalur kurang mampu membawa fotokopi SKTM/KIP/PKH</li>
                                        <li>Khusus jalur prestasi melampirkan sertifikat yang di upload di akun PPDB.</li>
                                        <li>
                                            a. Pada jurusan MIA ( Matematika dan Ilmu Alam/IPA) berkas dimasukkan kedalam
                                            map berwarna Merah<br>
                                            b. Pada jurusan IIS (Ilmu-Ilmu social/IPS) berkas dimasukkan kedalam map
                                            berwarna Biru<br>
                                            c. Pada jurusan IBB (Ilmu Bahasa dan Budaya) berkas dimasukkan kedalam map
                                            kuning<br>
                                            d. Pada jurusan IA (Peminatan Keagamaan) berkas dimasukkan kedalam map hijau<br>
                                        </li>
                                        <li>Mengisi surat pernyataan yang bermaterai.</li>
                                    </ol>

                                    <center>
                                        Link zoom Rapat Komite dengan Orangtua siswa MAN 2 Model Medan:
                                        <br>
                                        SENIN, 14 JUNI 2021 ( 09.00 WIB) <a
                                            href="https://us02web.zoom.us/j/89342115761?pwd=eVJqeDFkOUtJQ1ZHaUgwU2hpdXFvdz09">https://us02web.zoom.us/j/89342115761?pwd=eVJqeDFkOUtJQ1ZHaUgwU2hpdXFvdz09</a>

                                        <br>
                                        <br>
                                        <button class="btn btn-success" onclick="window.print()"><i class="fa fa-print"></i>
                                            Cetak</button>
                                    </center>
                                </div>
                            @endif
                        </div>
                    @else
                        <div class="row">
                            <div class="col-12">
                                <br>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                @if (auth()->user()?->status_kelulusan > 3)
                                    <div
                                        class="alert {{ auth()->user()?->status_kelulusan == 4 ? 'alert-success' : 'alert-danger' }}">
                                        <h4>{{ auth()->user()?->status_pendaftaran }}</h4>
                                        @if (auth()->user()?->catatan_kelulusan)
                                            <br>
                                            <b>Catatan :</b>
                                            <p>{{ auth()->user()?->catatan_kelulusan }}</p>
                                        @endif
                                    </div>
                                @endif

                                @if ($message = Session::get('success'))
                                    <div class="alert alert-success">
                                        {{ $message }}
                                    </div>
                                @endif

                                @if ($message = Session::get('error'))
                                    <div class="alert alert-danger">
                                        {{ $message }}
                                    </div>
                                @endif


                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 col-sm-3">
                                <div class="text-center card-box">
                                    <div class="card p-2">
                                        <div class="thumb-xl member-thumb m-b-10 mx-auto d-block">
                                            <img src="{{ Storage::url(auth()->user()?->identity?->pas_foto_url) }}"
                                                class="rounded-circle img-thumbnail" alt="profile-image"
                                                style="width:125px;height:125px;object-fit:cover;object-position:center;">
                                            <i class="mdi mdi-star-circle member-star text-success"
                                                title="verified user"></i>
                                        </div>

                                        <div class="">
                                            <h4 class="m-b-5">{{ auth()->user()?->identity?->nama }}</h4>

                                            @if (auth()->user()?->status_kelulusan < 4)
                                                <p>
                                                    {{ auth()->user()?->status_pendaftaran }}
                                                </p>
                                            @endif

                                            <div class="text-left">
                                                <p class="text-muted font-13">
                                                    <strong>NIK :</strong>
                                                    <br><span>{{ auth()->user()?->identity?->nik }}</span>
                                                </p>

                                                <p class="text-muted font-13"><strong>Email :</strong>
                                                    <br><span>{{ auth()->user()?->email }}</span>
                                                </p>

                                            </div>
                                        </div>

                                    </div> <!-- end member-card -->
                                </div>
                            </div>

                            <div class="col-12 col-sm-9 {{ auth()->user()?->status_kelulusan == 5 ? 'd-none' : '' }}">
                                @include('panitia.siswa.ringkasan')
                            </div>
                        </div>

                    @endif
                @endif
            </div>
            <!-- /.col -->
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

        @if (auth()->user()?->status_kelulusan == 1)
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
