<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>{{$title ?? env('APP_NAME')}}</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css" />
    <!-- Google Fonts Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" />
    <!-- MDB -->
    {{-- <link rel="stylesheet" href="{{ asset('build/assets/app.60e44ed0.css') }}" /> --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Custom styles -->
</head>

<body>

    <!--Main Navigation-->
    <header>
        @include('partials.header')
        <div id="intro" class="p-5  bg-light border">
            @yield('jumbotrom')
        </div>
    </header>
    <!--Main layout-->
    <main class="my-3" style=" margin-top: 58px;">
        @yield('content')
    </main>
    <!--Main layout-->
    <!--Footer-->
    <footer class="bg-light text-lg-start">
        @include('partials.footer')
    </footer>
    <!--Footer-->
    <!-- MDB -->
    {{-- <script type="text/javascript" src="{{ asset('build/assets/app.a801ee61.js') }}"></script> --}}
    <!-- Custom scripts -->
    {{-- <script type="text/javascript" src="js/script.js"></script> --}}
</body>

</html>
