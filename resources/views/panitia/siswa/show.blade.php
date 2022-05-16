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
                        </div>
                    </div>

                    <div class="card-body">
                        <table class="table table-bordered">
                            <tr>
                                <td><b>NISN</b></td>
                                <td>{{ $user->nisn }}</td>
                            </tr>
                            <tr>
                                <td><b>Nama</b></td>
                                <td>{{ $user->name }}</td>
                            </tr>
                            <tr>
                                <td><b>E-Mail</b></td>
                                <td>{{ $user->email }}</td>
                            </tr>
                            <tr>
                                <td><b>Status Akun</b></td>
                                <td>{{ $user->status_verif }}</td>
                            </tr>
                        </table>

                        <center>
                            <a href="{{ Storage::url($user->file_url) }}">
                                <img src="{{ Storage::url($user->file_url) }}" alt="" width="350px">
                            </a>
                        </center>
                    </div>
                </div>

                @if ($user->skhu)
                    @include('staff.user.ringkasan')
                @endif
            </div>
        </div>
    </div>
@endsection
