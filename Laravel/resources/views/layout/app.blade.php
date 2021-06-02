<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <!-- Boostrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/bootstrap-icons.css">
    <!-- Load CSS -->
    <link rel="stylesheet" type="text/css" href="{{url('assets/css/master.css') }}">
    <!-- Load DataTables -->
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">

    <title>@yield('title')</title>
</head>

<body>

    @include('includes.navbar')
    {{-- <nav class="navbar navbar-expand-lg navbar-light rounded-bottom" style="background-color: #ffe600;">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="https://412292.smushcdn.com/560079/wp-content/uploads/sites/81/2020/07/cropped-LogoIFLABWEbsite-1-3.png?lossy=1&strip=1&webp=1"
                    alt="" loading="lazy">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
                <form class="form-inline">
                    <a href="/login"><button class="btn btn-outline-dark mr-sm-2" type="button">Login</button></a>
                    <a href=""><button class="btn btn-dark" type="button">Join Now</button></a>
                </form>
            </div>
        </div>
    </nav> --}}
    
    @yield('content')
    
    @include('includes.footer')



    @stack('add-js')


</body>
@include('sweetalert::alert')
</html>