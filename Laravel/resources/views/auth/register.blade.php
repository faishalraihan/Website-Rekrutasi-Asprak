@extends('layout.app')

@section('title','Login')

@section('content') <div class="container" id="col_login">
    <div class="row mb-5">
        <div class="col-md-5 mx-auto mt-5">
            <div class="card" style="height: 80vh;border: none;">
                <div class="card-header text-center" style="background-color: #ffe600;">
                    <h3>Register</h3>
                </div>
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <div class="card-body">
                    <form method="POST" action="{{url('/store')}}">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="exampleInputFullName1">Full Name</label>
                            <input type="text" class="form-control" name="name" placeholder="Full name">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputNIM1">NIM</label>
                            <input type="text" class="form-control" name="nim" placeholder="NIM">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email address</label>
                            <input type="email" class="form-control" name="email" id="exampleInputEmail1"
                                aria-describedby="emailHelp" value="{{old('email')}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" class="form-control" name="password" id="exampleInputPassword1">
                        </div>
                        <div class="form-group">
                            <label for="password-confirm">Re-Password</label>
                            <input id="password-confirm" type="password" class="form-control"
                                name="password_confirmation" required>
                        </div>
                        <button type="submit" class="btn btn-white col-md-12"
                            style="background-color: #ffe600;">Login</button>

                    </form>
                </div>
                <div class="card-footer text-muted">
                    Already have an account?
                    <a href="{{url('/login')}}">Login</a>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection