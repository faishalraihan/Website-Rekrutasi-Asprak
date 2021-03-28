<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title>Website Rekrutasi Asprak</title>
</head>

<body style="background-color: #e6e5e5;">
    <nav class="navbar navbar-expand-lg navbar-light rounded-bottom" style="background-color: #ffe600;">
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
                    <button class="btn btn-outline-dark mr-sm-2" type="button">Login</button>
                    <button class="btn btn-dark" type="button">Join Now</button>
                </form>
            </div>
        </div>
    </nav>

    <div class="container" id="col_login">
        <div class="row">
            <div class="col-md-5 mx-auto mt-5">
                <div class="card" style="height: 60vh;border: none;">
                    <div class="card-header text-center" style="background-color: #ffe600;">
                        <h3>Login</h3>
                    </div>
                    @if(\Session::has('alert'))
                        <div class="alert alert-danger">
                            <div>{{Session::get('alert')}}</div>
                        </div>
                    @endif
                    @if(\Session::has('alert-success'))
                        <div class="alert alert-success">
                            <div>{{Session::get('alert-success')}}</div>
                        </div>
                    @endif
                    <div class="card-body">
                        <form method="POST" action="{{url('/loginPost')}}">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email address</label>
                                <input type="email" class="form-control" name="email" id="exampleInputEmail1"
                                    aria-describedby="emailHelp">
                                <small id="emailHelp" class="form-text text-muted">We'll never share your email with
                                    anyone
                                    else.</small>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Password</label>
                                <input type="password" class="form-control" name="password" id="exampleInputPassword1">
                            </div>
                            <div class="form-group form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">Remember me</label>
                            </div>
                            <button type="submit" class="btn btn-white col-md-12"
                                style="background-color: #ffe600;">Login</button>

                        </form>
                    </div>
                    <div class="card-footer text-muted">
                        Don't have an account?
                        <a href="{{url('/register')}}">Create Account</a>
                    </div>
                </div>
            </div>
        </div>

    </div>


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
        </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
        </script>

    <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    -->
</body>

</html>