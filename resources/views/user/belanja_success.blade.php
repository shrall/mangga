<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    {{-- Font Awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <div class="bg-light-200 font-pn w-screen h-screen flex flex-col items-center justify-center gap-y-2">
        <img src="{{ asset('assets/svg/belanja-berhasil.svg') }}" alt="" srcset="" class="w-vw-80 md:w-auto">
        <div class="text-3xl text-center">Selamat!<br>Transaksi anda berhasil.</div>
        <a href="{{ route('user.index') }}" class="mangga-button-green cursor-pointer">
            Kembali ke Beranda
            <span class="fa fa-fw fa-arrow-right"></span>
        </a>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
</body>

</html>
