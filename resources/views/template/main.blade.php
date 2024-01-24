<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta content="{{ csrf_token() }}" name="csrf-token">
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/favicon/favicon.ico') }}" />
    <title>@yield('title-front')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Jomhuria&display=swap');

        .tentang {
            font-family: 'Jomhuria', cursive;
            font-size: 80px;

        }

        .background-image-home {
            background-image: url('../assets/img/background-home.png');
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
        }

        .elips {
            background-image: url({{ asset('assets/img/elips.png') }});
            background-repeat: no-repeat;
            background-size: contain;
            background-position: center;
            width: 200px;
            height: 450px;
        }

        .text-position {
            font-family: 'Jomhuria', cursive;
            padding: 10px;
            margin-top: 90px;
            color: white;
        }

        .judul {
            font-size: 80px;
        }

        .tagline {
            font-size: 25px;
        }

        .about {
            font-family: 'Jomhuria', cursive;
        }

        .about-header {
            font-size: 50px;
            background-image: linear-gradient(to right, rgb(160, 207, 138), rgb(255, 255, 255));
        }

        .about-tagline {
            font-size: 30px;
        }

        .emot {
            color: #9e33cf;
        }

        .contact {
            background-color: #97d47f8f;
        }

        .bg-custom {
            background-color: #0d6efd;
            /* For browsers that do not support gradients */
            background-image: linear-gradient(#5af31d, #afbcf7);
        }

        .saran-kritik {
            background-color: #719A5E;
        }

        @media (max-width: 768px) {
            .tentang {
                font-size: 40px !important;
            }

            .about-tagline {
                font-size: 25px;
            }
        }

        @media (max-width: 576px) {
            .tentang {
                font-size: 50px !important;
            }

            .about-tagline {
                font-size: 20px;
            }
        }

        input[type=radio] {
            display: none;
        }

        .selectable:has(input:checked) {
            border: 2px solid green;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary"
        style="border-bottom-style: solid; border-bottom-color: #06811A">
        <div class="container-fluid">
            <a class="navbar-brand fw-bold" href="{{ route('home') }}">
                <img src="{{ asset('assets/img/logo.png') }}" alt="" width="50" class="d-inline-block ">
                AKSI RSQ</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav text-center ms-auto">
                    <li class="nav-item p-3 ">
                        <a class="nav-link fw-bold active" aria-current="page" href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="nav-item p-3">
                        <a class="nav-link fw-bold" href="#about">About Us</a>
                    </li>
                    <li class="nav-item p-3">
                        <a class="nav-link fw-bold" href="{{ route('kritik-saran') }}">Kritik dan Saran</a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        @yield('content-front')
    </div>
    <footer class="py-3 bg-ligth my-4">

        <p class="text-center text-dark fw-bold ">© Azahra Syahiradania</p>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>

</body>

</html>
