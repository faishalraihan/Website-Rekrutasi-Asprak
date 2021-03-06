@extends('layout.app-aslab')

@section('title','Login')

@section('content') <div class="container" id="col_login" style="margin-bottom: 400px">
    <div class="row mb-5">
        <div class="col-md-5 mx-auto mt-5">
            <div class="card" style="height: 80vh;border: none;">
                <div class="card-header text-center" style="background-color: #ffe600;">
                    <h3>Register Aslab</h3>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('aslab.store')}}">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="exampleInputFullName1">Full Name</label>
                            <input type="text" class="form-control" name="name" placeholder="Full name">
                            @if ($errors->has('name'))
                            <span class="help-block">
                                <small style="color:rgb(255, 34, 34)">{{ $errors->first('name') }}</small>
                            </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="exampleInputNIM1">NIM</label>
                            <input type="text" class="form-control" name="nim" placeholder="NIM">
                            @if ($errors->has('nim'))
                            <span class="help-block">
                                <small style="color:rgb(255, 34, 34)">{{ $errors->first('nim') }}</small>
                            </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email address</label>
                            <input type="email" class="form-control" name="email" id="exampleInputEmail1"
                                aria-describedby="emailHelp" value="{{old('email')}}">
                            @if ($errors->has('email'))
                            <span class="help-block">
                                <small style="color:rgb(255, 34, 34)">{{ $errors->first('email') }}</small>
                            </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" class="form-control" name="password" id="exampleInputPassword1">
                            @if ($errors->has('password'))
                            <span class="help-block">
                                <small style="color:rgb(255, 34, 34)">{{ $errors->first('password') }}</small>
                            </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="password-confirm">Re-Password</label>
                            <input id="password-confirm" type="password" class="form-control"
                                name="password_confirmation">
                            @if ($errors->has('password_confirmation'))
                            <span class="help-block">
                                <small
                                    style="color:rgb(255, 34, 34)">{{ $errors->first('password_confirmation') }}</small>
                            </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="jurusan">Jurusan</label>
                            <div class="input-group">
                                <select class="custom-select" id="jurusan" placeholder="Pilih Jurusan Anda"
                                    name="jurusan">
                                    <option selected disabled>Pilih Jurusan Anda</option>
                                    <option value="Informatika">Informatika</option>
                                    <option value="Teknologi Informasi">Teknologi Informasi</option>
                                    <option value="Rekayasa Perangkat Lunak">Rekayasa Perangkat Lunak</option>
                                    <option value="Data Science">Data Science</option>
                                </select>
                            </div>

                            @if ($errors->has('jurusan'))
                            <span class=" help-block">
                                <small style="color:rgb(255, 34, 34)">{{ $errors->first('jurusan') }}</small>
                            </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="angkatan">Angkatan</label>
                            <div class="input-group">
                                <select class="custom-select" id="angkatan" placeholder="Pilih Tahun Angkatan"
                                    name="angkatan">
                                    <option selected disabled>Pilih Tahun Angkatan</option>
                                    <option value="2018">2018</option>
                                    <option value="2019">2019</option>
                                    <option value="2020">2020</option>
                                </select>
                            </div>

                            @if ($errors->has('angkatan'))
                            <span class=" help-block">
                                <small style="color:rgb(255, 34, 34)">{{ $errors->first('angkatan') }}</small>
                            </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="kelas">Kelas Default</label>
                            <input type="text" class="form-control" id="kelas" aria-describedby="emailHelp"
                                placeholder="Ketikkan Kelas Default" name="kelas" value="{{ old('kelas') }}">
                            @if ($errors->has('kelas'))
                            <span class=" help-block">
                                <small style="color:rgb(255, 34, 34)">{{ $errors->first('kelas') }}</small>
                            </span>
                            @endif
                        </div>
                        <button type="submit" class="btn btn-white col-md-12"
                            style="background-color: #ffe600;">Register</button>

                    </form>
                    <div class="card-footer text-muted">
                        Already have an account?
                        <a href="{{url('/login')}}">Login</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection