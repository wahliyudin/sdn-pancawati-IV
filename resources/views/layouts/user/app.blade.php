<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('assets/css/home.css') }}">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    @include('layouts.user.inc.head')
</head>

<body>
    <div class="app">
        <div class="wrapper-head">
            <header>
                <h1 class="head-title">MAN 3 KARAWANG</h1>
            </header>
            <ul>
                <li>
                    <a href="{{ route('user.home') }}" class="head-link">
                        <i class='bx bxs-grid-alt'></i>
                        <span>Beranda</span>
                    </a>
                </li>
                @auth
                    <li>
                        <a href="{{ route('pendaftaran') }}" class="head-link">
                            <i class='bx bxs-grid-alt'></i>
                            <span>Pendaftaran</span>
                        </a>
                    </li>
                @else
                    <li>
                        <a href="{{ route('login') }}" class="head-link">
                            <i class='bx bx-log-in-circle'></i>
                            <span>Masuk</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('register') }}" class="head-link">
                            <i class='bx bxs-pencil'></i>
                            <span>Daftar Sekarang</span>
                        </a>
                    </li>
                @endauth
            </ul>
        </div>

        <main>
            @yield('content')
        </main>
    </div>

    @include('layouts.user.inc.foot')
</body>

</html>
