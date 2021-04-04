@extends('layout.app')

@section('title','Daftar Asprak')

@section('content')
<form class="container daftar-asprak"
    style="margin-top: 5vh;height:fit-content;margin-bottom: 50px; background-color: rgb(192, 230, 238);border-radius: 20px;">
    <div class="row">
        <div class="col-md-12">
            <h1 class="text-center mt-3">Pendaftaran Asprak</h1>
            <p class="text-center mt-0">T.A. 2020/2021</p>
        </div>
    </div>
    <div class="row mx-5">
        <div class="col-md-6">
            <!-- <div class="form-field" style="margin-top: 35%;"> -->
            <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                <small id="emailHelp" class="form-text text-muted">*Gunakan Email SSO</small>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Nama Lengkap</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                    placeholder="Nama Lengkap">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">NIM</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                    placeholder="Masukkan NIM">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Jurusan</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                    placeholder="Masukkan Jurusan">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Angkatan</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                    placeholder="Ketik Jurusan Anda">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="exampleInputEmail1">Kelas Default</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                    placeholder="Ketikkan Kelas Default ">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Pilihan Mata Kuliah Praktikum</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                    placeholder="Mata Kuliah Praktikum">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password Akun">
            </div>
            <button type="submit" class="btn btn-info mt-4 mb-5" style="width: 100%;">Daftar</button>
        </div>
    </div>
</form>
@endsection