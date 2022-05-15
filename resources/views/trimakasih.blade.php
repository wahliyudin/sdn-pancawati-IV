<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
    <meta name="author" content="Coderthemes">

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}">
    <!-- App title -->
    <title>PPDB MAN 2 Model Medan - Registrasi Berhasil</title>

    <!-- App css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/icons.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}" />


    <script src="{{ asset('assets/js/modernizr.min.js') }}"></script>
    <style>
        .account-logo-box {
            background-color: #359e78;
        }

    </style>
</head>


<body class="bg-transparent">

    <!-- HOME -->
    <section>
        <div class="container-alt">
            <div class="row">
                <div class="col-sm-12">

                    <div class="wrapper-page">

                        <div class="m-t-40 account-pages">
                            <div class="text-center account-logo-box">
                                <div class="m-t-10 m-b-10">
                                    <a href="{{ route('home') }}" class="text-success">
                                        <span><img src="{{ asset('assets/images/logo_me.png') }}" alt=""
                                                height="36"></span>
                                        <h2 style="color:#FFF">@yield('title', config('app.name', 'Laravel'))</h2>
                                    </a>
                                </div>
                                <!--<h4 class="text-uppercase font-bold m-b-0">Sign In</h4>-->
                            </div>
                            <div class="account-content">
                                <div class="text-center m-b-20">
                                    <div class="m-b-20">
                                        <div class="checkmark">
                                            <svg version="1.1" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 130.2 130.2">
                                                <circle class="path circle" fill="none" stroke="#4bd396"
                                                    stroke-width="6" stroke-miterlimit="10" cx="65.1" cy="65.1"
                                                    r="62.1" />
                                                <polyline class="path check" fill="none" stroke="#4bd396"
                                                    stroke-width="6" stroke-linecap="round" stroke-miterlimit="10"
                                                    points="100.2,40.2 51.5,88.8 29.8,67.5 " />
                                            </svg>
                                        </div>
                                    </div>

                                    <h3>Terima Kasih !</h3>

                                    <p class="text-muted font-13 m-t-10"> Pendaftaran kamu sudah diterima sistem.
                                        Username dan Password akan dikirimkan melalui email kamu jika pendaftaran sudah
                                        di verifikasi oleh panitia. </p>
                                </div>
                            </div>
                        </div>
                        <!-- end card-box-->


                        <div class="row m-t-50">
                            <div class="col-sm-12 text-center">
                                <p class="text-muted">Sudah pernah mendaftar ? <a href="{{ route('login') }}"
                                        class="text-primary m-l-5"><b>Log In</b></a></p>
                            </div>
                        </div>

                    </div>
                    <!-- end wrapper -->

                </div>
            </div>
        </div>
    </section>
    <!-- END HOME -->

    <script>
        var resizefunc = [];
    </script>

    <!-- jQuery  -->
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/detect.js') }}"></script>
    <script src="{{ asset('assets/js/fastclick.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.blockUI.js') }}"></script>
    <script src="{{ asset('assets/js/waves.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.slimscroll.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.scrollTo.min.js') }}"></script>

    <!-- App js -->
    <script src="{{ asset('plugins/bootstrap-filestyle/js/bootstrap-filestyle.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.core.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.app.js') }}"></script>

</body>

</html>
