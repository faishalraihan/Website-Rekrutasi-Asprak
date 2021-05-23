@extends('layout.app')

@section('title','Test Tulis')

@section('content')
<div class="jumbotron jumbotron-fluid">
    <div class="container text-center">
        <h1 class="display-4">Koreksi Jawaban Tes Rekrutasi Asprak</h1>
        <!-- <p class="lead">This is a modified jumbotron that occupies the entire horizontal space of its parent.</p> -->
    </div>
</div>
{{-- {{dd($jawabanTest)}} --}}
<div class="container-fluid px-5 mb-5">
    <div class="row">
        <div class="col-md-9 pl-5 mb-5">
            <table class="mb-5">
                <tr>
                    <td style="width:180px;">Nama Asprak</td>
                    <td style="width: 30px;">:</td>
                    <td>
                        <b class="text-success" style="text-transform: uppercase">{{$jawabanTest->name}}</b>
                    </td>
                </tr>
                <tr>
                    <td style="width:180px;">NIM</td>
                    <td style="width: 30px;">:</td>
                    <td>
                        <b class="text-success" style="text-transform: uppercase">{{$jawabanTest->nimPendaftar}}</b>
                    </td>
                </tr>
                <tr>
                    <td style="width:180px;">Mata Kuliah</td>
                    <td style="width: 30px;">:</td>
                    <td>
                        <b class="text-primary"
                            style="text-transform: uppercase">{{$jawabanTest->pilihan_praktikum}}</b>
                    </td>
                </tr>
            </table>
            <form method="POST" action="{{route('hasils.store')}}">
                @csrf
                <div class="mb-3">
                    <label for="soaltest" style="font-weight: bold" class="form-label">Soal Test</label>
                    <div class="mb-4 soaltest py-3 px-3" style="background-color: #f4f4f4;border-radius: 10px">
                        {{$jawabanTest->soal}}
                    </div>

                    <label for="jawaban" style="font-weight: bold" class="form-label">Jawaban Asprak</label>
                    <div class="mb-4 soaltest py-3 px-3" style="background-color: #f4f4f4;border-radius: 10px">
                        {{$jawabanTest->jawaban}}
                    </div>
                    <label for="kunciJawaban" style="font-weight: bold" class="form-label">Kunci Jawaban</label>
                    <div class="mb-4 soaltest py-3 px-3" style="background-color: #8ee1dac5;border-radius: 10px">
                        {{$jawabanTest->kunciJawaban}}
                    </div>
                    <hr>
                    <label for="nilai" style="font-weight: bold" class="form-label">Nilai</label>
                    <div class="input-group">
                        <input type="number" name="nilai" class="form-control" aria-label="Nilai dengan skala 1-100">
                        <span class="input-group-text">/100</span>
                    </div>
                    <input type="text" value="{{$jawabanTest->id_test}}" name="id_test" hidden>
                    <input type="text" value="{{$jawabanTest->id_pendaftaran}}" name="id_pendaftaran" hidden>
                </div>
                <button type="submit" class="btn btn-primary float-right">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection