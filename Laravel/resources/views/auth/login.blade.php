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
    @include('includes.navbar')

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


    @include('includes.footer')
</body>

</html>