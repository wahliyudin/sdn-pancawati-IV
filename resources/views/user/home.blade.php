@extends('layouts.user.app')

@section('content')
    <div class="wrapper-content">
        <h1 class="content-title">Statistik Pendaftaran</h1>

        <div class="wrapper-cards">
            <div class="card">
                <span class="card-title">Total Jumlah Pendaftar</span>
                <span class="card-count">{{ App\Models\User::count() }}</span>
                <i class='bx bx-user-circle'></i>
            </div>
        </div>
    </div>
@endsection
