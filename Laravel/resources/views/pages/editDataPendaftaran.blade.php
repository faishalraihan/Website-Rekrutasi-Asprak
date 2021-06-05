@extends('layout.app-aslab')

@section('title','Edit Data Pendaftar Calon Asprak')

@section('content')
<div class="container" id="col_login" style="margin-bottom: 900px">


    <ul class="nav nav-tabs justify-content-center mt-3 mx-5" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <a class="nav-link active" id="view-tab" data-toggle="tab" href="#view" role="tab" aria-controls="view"
                aria-selected="true">View Data</a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link" id="edit-tab" data-toggle="tab" href="#edit" role="tab" aria-controls="edit"
                aria-selected="false">Edit Data</a>
        </li>
    </ul>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="view" role="tabpanel" aria-labelledby="view-tab">
            <div class="row view-data mb-5">
                <div class="col-md-9 mx-auto mt-5">
                    <div class="card" style="height: 80vh;border: none;">
                        <div class="card-header text-center" style="background-color: #ffe600;">
                            <h3>Detail Data Pendaftar</h3>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('postUpdate',[$asprak->id]) }}"
                                enctype="multipart/form-data" style="height: fit-content">
                                @csrf
                                <input type="hidden" name="_method" value="PUT">
                                <div class="form-group">
                                    <label for="name">Full Name</label>
                                    <h5 class="text-primary" for="name">{{$asprak->name}}</h5>
                                </div>
                                <div class="form-group">
                                    <label for="nim">NIM</label>
                                    <h5 class="text-primary" for="name">{{$asprak->nimPendaftar}}</h5>
                                </div>

                                <div class="form-group">
                                    <label for="praktikumPilihan">Pilihan Mata Kuliah Praktikum</label>
                                    <h5>{{$asprak->pilihan_praktikum}}</h5>
                                </div>
                                <div class="form-group">
                                    <label for="berkas">Berkas (CV)</label>
                                    <iframe src="{{ asset('storage/'.$asprak->berkas)}}" frameborder="1"
                                        style="min-height: 500px;max-height: 700px border: 1px solid black;overflow: scroll;"
                                        class="w-100"></iframe>
                                    <a type="button" class="btn btn-outline-primary w-100 mt-3"
                                        href="{{ asset('storage/'.$asprak->berkas)}}" target="_blank">Full Screen</a>
                                </div>


                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="edit" role="tabpanel" aria-labelledby="edit-tab">
            <div class="row edit-data mb-5">
                <div class="col-md-9 mx-auto mt-5">
                    <div class="card" style="height: 80vh;border: none;">
                        <div class="card-header text-center" style="background-color: #ffe600;">
                            <h3>Edit Data Pendaftar</h3>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('postUpdate',[$asprak->id]) }}"
                                enctype="multipart/form-data" style="height: fit-content">
                                @csrf
                                <input type="hidden" name="_method" value="PUT">
                                <div class="form-group">
                                    <label for="name">Full Name</label>
                                    <h5 class="text-primary" for="name">{{$asprak->name}}</h5>
                                    <input type="text" class="form-control" name="name" placeholder="Full name"
                                        value="{{old('name') ? old('name') : $asprak->name}}" hidden>
                                    @if ($errors->has('name'))
                                    <span class="help-block">
                                        <small style="color:rgb(255, 34, 34)">{{ $errors->first('name') }}</small>
                                    </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="nim">NIM</label>
                                    <h5 class="text-primary" for="name">{{$asprak->nimPendaftar}}</h5>
                                    <input type="text" class="form-control" name="nim" placeholder="NIM"
                                        value="{{old('nim') ? old('nim') : $asprak->nimPendaftar}}" hidden>
                                    @if ($errors->has('nim'))
                                    <span class="help-block">
                                        <small style="color:rgb(255, 34, 34)">{{ $errors->first('nim') }}</small>
                                    </span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="praktikumPilihan">Pilihan Mata Kuliah Praktikum</label>
                                    <div class="input-group">
                                        <select class="custom-select" id="pilihan_praktikum"
                                            placeholder="Mata Kuliah Praktikum" name="pilihan_praktikum">
                                            <option disabled>Open this select menu</option>
                                            <option {{$asprak->pilihan_praktikum == "dap" ? "selected" : ""}}
                                                value=" dap">DAP
                                            </option>
                                            <option {{$asprak->pilihan_praktikum == "appl" ? "selected" : ""}}
                                                value="appl">APPL
                                            </option>
                                            <option {{$asprak->pilihan_praktikum == "webpro" ? "selected" : ""}}
                                                value="webpro">
                                                Website Programming</option>
                                            <option {{$asprak->pilihan_praktikum == "std" ? "selected" : ""}}
                                                value="std">
                                                Struktur Data</option>
                                            <option {{$asprak->pilihan_praktikum == "pbo" ? "selected" : ""}}
                                                value="pbo">
                                                Pemrograman Berbasis Object</option>
                                            <option {{$asprak->pilihan_praktikum == "sister" ? "selected" : ""}}
                                                value="sister">
                                                Sistem Paralel dan Terdistribusi</option>
                                            <option {{$asprak->pilihan_praktikum == "pbd" ? "selected" : ""}}
                                                value="pbd">
                                                Pemodelan Basis Data</option>
                                        </select>
                                    </div>

                                    @if ($errors->has('pilihan_praktikum'))
                                    <span class="help-block">
                                        <small
                                            style="color:rgb(255, 34, 34)">{{ $errors->first('pilihan_praktikum') }}</small>
                                    </span>
                                    @endif
                                </div>
                                {{-- <div class="form-group">
                                    <label for="berkas">Berkas (CV)</label>
                                    <div class="input-group mb-3">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="inputGroupFile03"
                                                aria-describedby="inputGroupFileAddon03" name="berkas" value="">
                                            <input type="text" class="custom-file-input" id="inputGroupFile03"
                                                aria-describedby="inputGroupFileAddon03" name="berkaslama" value="{{$asprak->berkas}}" hidden>
                                            
                                            <label class=" custom-file-label overflow-hidden"
                                                for="inputGroupFile03">{{old('berkas') ? old('berkas') : $asprak->berkas}}</label>
                                        </div>
                                    </div>
                                    <iframe src="{{ asset('storage/'.$asprak->berkas)}}" frameborder="1"
                                        style="min-height: 500px;max-height: 700px border: 1px solid black;overflow: scroll;"
                                        class="w-100"></iframe>
                                    <a type="button" class="btn btn-outline-primary w-100 mt-3"
                                        href="{{ asset('storage/'.$asprak->berkas)}}" target="_blank">Full Screen</a>
                                    @if ($errors->has('berkas'))
                                    <span class="help-block">
                                        <small style="color:rgb(255, 34, 34)">{{ $errors->first('berkas') }}</small>
                                    </span>
                                    @endif

                                </div> --}}

                                <button type="submit" class="btn btn-white col-md-12"
                                    style="background-color: #ffe600;">Update</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>





</div>

</div>
@endsection