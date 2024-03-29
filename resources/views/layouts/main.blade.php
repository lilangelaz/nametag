<!DOCTYPE html>
<html lang="en-US" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{-- <meta name="csrf-token" content="{{ csrf_token() }}"> --}}


    <!-- ===============================================-->
    <!--    Document Title-->
    <!-- ===============================================-->
    <title>PalmCo | Generate Nametag</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.4.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- ===============================================-->
    <!--    Favicons-->
    <!-- ===============================================-->
    <link rel="apple-touch-icon" sizes="180x180" href={{ @asset("assets/img/favicons/apple-touch-icon.png") }}>
    <link rel="icon" type="image/png" sizes="32x32" href={{ @asset("assets/img/favicons/favicon-32x32.png") }}>
    <link rel="icon" type="image/png" sizes="16x16" href={{ @asset("assets/img/favicons/favicon-16x16.png") }}>
    <link rel="shortcut icon" type="image/x-icon" href={{ @asset("assets/img/favicons/favicon.ico") }}>
    <link rel="manifest" href={{ @asset("assets/img/favicons/manifest.json") }}>
    <meta name="msapplication-TileImage" content={{ @asset("assets/img/favicons/mstile-150x150.png") }}>
    <meta name="theme-color" content="#ffffff">


    <!-- ===============================================-->
    <!--    Stylesheets-->
    <!-- ===============================================-->
    @stack('css')

</head>

<body>

    <!-- ===============================================-->
    <!--    Main Content-->
    <!-- ===============================================-->
    <main class="main" id="top">
        <div class="container" data-layout="container">
          <script>
            var isFluid = JSON.parse(localStorage.getItem('isFluid'));
            if (isFluid) {
              var container = document.querySelector('[data-layout]');
              container.classList.remove('container');
              container.classList.add('container-fluid');
            }
          </script>
          {{-- @include('layouts.sidebar') --}}
          <div class="content">
            @include('layouts.topbar')
            @yield('content')
            {{-- @include('layouts.footer') --}}
        </div>
      </div>
    </main>
    
    <!-- ===============================================-->
    <!--    JavaScripts-->
    <!-- ===============================================-->

    @stack('js')

</body>

</html>
