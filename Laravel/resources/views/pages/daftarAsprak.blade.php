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
            <h1 class="text-center mt-3">Pendaftaran Asprak</h1>
            <p class="text-center mt-0">T.A. 2020/2021</p>
        </div>
    </div>
    <div class="row mx-5">

    </div>

    <form method="POST" action="{{ route('pendaftarans.store') }}" enctype="multipart/form-data">
        <div class="row mx-5">
            {{ csrf_field() }}
            <div class="col-md-6">
                <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="email" class="form-control" id="email" aria-describedby="emailHelp"
                        placeholder="Masukkan Email" name="email" value="{{Session::get('email')}}" readonly>
                    <small id="emailHelp" class="form-text text-muted">*Gunakan Email SSO</small>
                </div>
                <div class="form-group">
                    <label for="name">Nama Lengkap</label>
                    <input type="text" class="form-control" id="name" aria-describedby="emailHelp"
                        placeholder="Nama Lengkap" name="name" value="{{Session::get('name')}}" readonly>

                </div>
                <div class="form-group">
                    <label for="nim">NIM</label>
                    <input type="text" class="form-control" id="nim" aria-describedby="emailHelp"
                        placeholder="Masukkan NIM" name="nim" value="{{Session::get('nim')}}" readonly>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="praktikumPilihan">Pilihan Mata Kuliah Praktikum</label>
                    <div class="input-group">
                        <select class="custom-select" id="pilihan_praktikum" placeholder="Mata Kuliah Praktikum"
                            name="pilihan_praktikum">
                            <option selected disabled>Open this select menu</option>
                            <option value=" dap">DAP</option>
                            <option value="appl">APPL</option>
                            <option value="webpro">Website Programming</option>
                            <option value="std">Struktur Data</option>
                            <option value="pbo">Pemrograman Berbasis Object</option>
                            <option value="sister">Sistem Paralel dan Terdistribusi</option>
                            <option value="pbd">Pemodelan Basis Data</option>
                        </select>
                    </div>

                    @if ($errors->has('pilihan_praktikum'))
                    <span class="help-block">
                        <small style="color:rgb(255, 34, 34)">{{ $errors->first('pilihan_praktikum') }}</small>
                    </span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="berkas">Berkas (CV)</label>
                    <div class="input-group mb-3">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="inputGroupFile03"
                                aria-describedby="inputGroupFileAddon03" name="berkas">
                            <label class=" custom-file-label" for="inputGroupFile03">Choose file</label>
                        </div>
                    </div>
                    @if ($errors->has('berkas'))
                    <span class="help-block">
                        <small class="alert">{{ $errors->first('berkas') }}</small>
                    </span>
                    @endif
                </div>
                <button type="submit" class="btn btn-info mt-4 mb-5" style="width: 100%;">Daftar</button>
            </div>
        </div>
    </form>

</div>
@endsection