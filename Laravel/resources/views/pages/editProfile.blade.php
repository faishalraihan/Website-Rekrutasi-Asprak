@extends('layout.app')

@section('title','Daftar Asprak')

@section('content')
<div class="container daftar-asprak pb-4"
    style="margin-top: 5vh;height:fit-content;margin-bottom: 50px; background-color: rgb(192, 230, 238);border-radius: 20px;">

    <div class="container">
        <div class="row text-center">
            <div class="col-md-12">
                @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <h1 class="text-center mt-3">Edit Profile</h1>
        </div>
    </div>
    <div class="row mx-5">

    </div>


    <form method="POST" action="{{url('/editProfile/'.$data->nim.'/update')}}">

        <div class="row mx-5">
        @csrf
            <div class="col-md-6">
                <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="email" class="form-control" id="email" aria-describedby="emailHelp"
                        placeholder="Masukkan Email" name="email" value="{{Session::get('email')}}">
                    <small id="emailHelp" class="form-text text-muted">*Gunakan Email SSO</small>
                </div>
                <div class="form-group">
                    <label for="name">Nama Lengkap</label>
                    <input type="text" class="form-control" id="name" aria-describedby="emailHelp"
                        placeholder="Nama Lengkap" name="name" value="{{Session::get('name')}}">

                </div>
                <div class="form-group">
                    <label for="nim">NIM</label>
                    <input type="text" class="form-control" id="nim" aria-describedby="emailHelp"
                        placeholder="Masukkan NIM" name="nim" value="{{Session::get('nim')}}">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                        <label for="jurusan">Jurusan</label>
                        <div class="input-group">
                            <select class="custom-select" id="jurusan" placeholder="Pilih Jurusan Anda"
                                name="jurusan">
                                <option disabled>Pilih Jurusan Anda</option>
                                <option {{$data->jurusan=="Informatika" ? "selected":""}}value="Informatika">Informatika</option>
                                <option {{$data->jurusan=="Teknologi Informasi" ? "selected":""}}value="Teknologi Informasi">Teknologi Informasi</option>
                                <option {{$data->jurusan=="Rekayasa Perangkat Lunak" ? "selected":""}}value="Rekayasa Perangkat Lunak">Rekayasa Perangkat Lunak</option>
                                <option {{$data->jurusan=="Data Science" ? "selected":""}}value="Data Science">Data Science</option>
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
                                <option {{$data->angkatan=="2018" ?"selected":""}} value="2018">2018</option>
                                <option {{$data->angkatan=="2019" ?"selected":""}} value="2019">2019</option>
                                <option {{$data->angkatan=="2020" ?"selected":""}} value="2020">2020</option>
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
                            placeholder="Ketikkan Kelas Default" name="kelas" value="{{ $data->kelas}}">
                        @if ($errors->has('kelas'))
                        <span class=" help-block">
                            <small style="color:rgb(255, 34, 34)">{{ $errors->first('kelas') }}</small>
                        </span>
                        @endif
                    </div>
                <button type="submit" class="btn btn-info mt-4 mb-5" style="width: 100%;">Daftar</button>
            </div>
        </div>
    </form>

</div>
@endsection