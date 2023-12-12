<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    </head>
    <style>
        .box-area {
        width: 930px;
        }
        .right-box {
        padding: 40px 30px 40px 40px;
        }

    </style>
    <body >
        <div class="container d-flex justify-content-center align-items-center min-vh-100">
            <!-- Row -->
            <div class="row border rounded-5 ps-2  pe-2 bg-white shadow box-area">
              <!-- col kiri -->
              <div class="col-md-6 rounded-4  d-flex justify-content-center align-items-center flex-column  left-box" style="height: 500px">
                <div class="featured-image ms-4">
                  <img src="../img/login-bg.jpg" class="rounded-4" style="height: 475px" />
                </div>
              </div>
              <!-- col kanan -->
              <div class="col-md-6 right-box">
                <div class="row ">
                  <div class="header-text">
                    <h2>Halo, Selamat Datang</h2>
                    <p>Senang Bertemu Anda Kembali</p>
                  </div>
                    {{ $slot }}
                </div>
   
    </body>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</html>
