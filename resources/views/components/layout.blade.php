<html>

<head>
    <title>{{ $title ?? 'Example Website' }}</title>
    <link rel="stylesheet" href="{{ asset('/css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://kit.fontawesome.com/314dc3b3ec.js" crossorigin="anonymous"></script>
    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">

    <style>
        /* Add this CSS block */
        html,
        body {
            height: 100%;
            margin: 0;
        }

        body {
            display: flex;
            flex-direction: column;
        }

        .content {
            flex: 1;
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <x-navbar> </x-navbar>

    <div class="content">
        {{ $slot }}
    </div>

    <x-footer> </x-footer>

    <!-- Footer -->

</body>

</html>
