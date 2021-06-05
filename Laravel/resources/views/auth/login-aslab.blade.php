@extends('layout.app-aslab')

@section('title','Login Aslab')

@section('content')
{{-- @include('includes.navbar') --}}
<div class="container" id="col_login">
    <div class="row mb-5">
        <div class="col-md-5 mx-auto mt-5">
            <div class="card" style="height: 60vh;border: none;">
                <div class="card-header text-center" style="background-color: #ffe600;">
                    <h3>Login Aslab</h3>
                </div>
                <!-- @if(\Session::has('alert'))
                <div class="alert alert-danger">
                    <div>{{Session::get('alert')}}</div>
                </div>
                @endif
                @if(\Session::has('alert-success'))
                <div class="alert alert-success">
                    <div>{{Session::get('alert-success')}}</div>
                </div>
                @endif -->
                <div class="card-body">
                    <form method="POST" action="{{route('loginPostAslab')}}">
                        {{-- {{ csrf_field() }} --}}
                        @csrf
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
                    <a href="{{url('/register-aslab')}}">Create Account</a>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection

{{-- <body style="background-color: #e6e5e5;"> --}}