@extends('layout.app-aslab')

@section('title','Test Tulis')

@section('content')
<div class="jumbotron jumbotron-fluid">
    <div class="container text-center">
        <h1 class="display-4">Tes Tulis Rekrutasi Asprak</h1>
        <!-- <p class="lead">This is a modified jumbotron that occupies the entire horizontal space of its parent.</p> -->
    </div>
</div>
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
<div class="container-fluid px-5 mb-5">
    <div class="row">
        <a type="button" class="btn btn-outline-success mb-4 ml-3" href="{{route('soals.create')}}">+ Buat Soal Baru</a>
    </div>

    <div class="row">
        @foreach ($soals as $soal)
        <div class="col-md-3 mb-3">
            <div class="card">
                <div class="card-header">
                    Soal {{$soal['matkul']}}
                </div>
                <div class="card-body">
                    <h6 class="card-title">Pembuat Soal : {{$soal['nimPembuat']}}</h6>
                    <a href="{{route('soals.show',[$soal->id])}}" class="btn btn-primary">Lihat Soal</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection