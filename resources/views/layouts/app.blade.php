<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>{{ $title }} - {{ config('app.name') }}</title> 

    <!-- Import bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap-icons/font/bootstrap-icons.min.css') }}"> <!--script untuk memanggil css -->
</head>

<body>
    @include('partials.navbar') <!-- Mengambil component navbar,partisals unutuk menampilkan folder yg ada di views,include di gunakan untuk mengambil fungsi2 komponen yang ada di dalam folder partials/navbar -->

    @yield('content') <!-- Render content,yield di gunakan untuk mendefinisikan tempat (section) di dalam sebuah loyouts -->

    @include('partials.modal') <!--include di gunakan untuk mengambil fungsi2 komponen yang ada di dalam folder partials/modal -->

    <script src="{{ asset('js/script.js') }}"></script> <!--script untuk memanggil javascript -->
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script> <!-- Import bootstrap JS -->
</body> <!-- wadah untuk menampilkan content-->

</html>
