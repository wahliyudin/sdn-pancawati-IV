<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('assets/css/home.css') }}">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
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
            </ul>
        </div>

        <main>
            <div class="wrapper-content">
                <h1 class="content-title">Statistik Pendaftaran</h1>

                <div class="wrapper-cards">
                    <div class="card">
                        <span class="card-title">Total Jumlah Pendaftar</span>
                        <span class="card-count">1</span>
                        <i class='bx bx-user-circle'></i>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>

</html>
