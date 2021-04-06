@extends('layout.app')

@section('title','Daftar Asprak')

@section('content')
<form class="container daftar-asprak pb-4"
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
                <label for="email">Email address</label>
                <input type="email" class="form-control" id="email" aria-describedby="emailHelp"
                    placeholder="Masukkan Email" name="email">
                <small id="emailHelp" class="form-text text-muted">*Gunakan Email SSO</small>
            </div>
            <div class="form-group">
                <label for="name">Nama Lengkap</label>
                <input type="text" class="form-control" id="name" aria-describedby="emailHelp"
                    placeholder="Nama Lengkap" name="name">
            </div>
            <div class="form-group">
                <label for="nim">NIM</label>
                <input type="text" class="form-control" id="nim" aria-describedby="emailHelp" placeholder="Masukkan NIM"
                    name="nim">
            </div>
            <div class="form-group">
                <label for="jurusan">Jurusan</label>
                <input type="text" class="form-control" id="jurusan" aria-describedby="emailHelp"
                    placeholder="Masukkan Jurusan" name="jurusan">
            </div>
            <div class="form-group">
                <label for="angkatan">Angkatan</label>
                <input type="text" class="form-control" id="angkatan" aria-describedby="emailHelp"
                    placeholder="Ketik Angkatan Anda" name="angkatan">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="kelas">Kelas Default</label>
                <input type="text" class="form-control" id="kelas" aria-describedby="emailHelp"
                    placeholder="Ketikkan Kelas Default" name="kelas">
            </div>
            <div class="form-group">
                <label for="praktikumPilihan">Pilihan Mata Kuliah Praktikum</label>
                <input type="text" class="form-control" id="praktikumPilihan" aria-describedby="emailHelp"
                    placeholder="Mata Kuliah Praktikum" name="praktikum_pilihan">
            </div>
            <div class="form-group">
                <label for="berkas">Berkas (CV)</label>
                <div class="input-group mb-3">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="inputGroupFile03"
                            aria-describedby="inputGroupFileAddon03" name="berkas">
                        <label class="custom-file-label" for="inputGroupFile03">Choose file</label>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-info mt-4 mb-5" style="width: 100%;">Daftar</button>
        </div>
    </div>
</form>
@endsection